<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeMod extends Command
{
    protected $signature = 'make:mod {name}';
    protected $description = 'Generate full-featured API module: Controller, Service, Interface, Request, Resource, Routes, Tests, Migration, Seeder';

    public function handle(): void
    {
        $input = $this->argument('name');
        $parts = explode('/', str_replace('\\', '/', $input));
        $parts = array_map(fn($p) => Str::studly($p), $parts);
        $name = array_pop($parts); // ModuleName
        $group = $parts ? implode('\\', $parts) . '\\' : '';
        $groupPath = $parts ? implode('/', $parts) . '/' : '';
        $lower = Str::snake($name);
        $plural = Str::plural($lower);
        $modulePath = app_path("Modules/{$groupPath}{$name}");

        // Create directory structure
        $folders = [
            'Controllers/Api',
            'Models',
            'Requests',
            'Resources',
            'Services',
            'Repositories',
            'Contracts',
            'Routes',
            'Providers',
            'Facades',
            'Tests/Feature',
            'Database/Migrations',
            'Database/Seeders',
        ];

        foreach ($folders as $folder) {
            File::ensureDirectoryExists("{$modulePath}/{$folder}");
        }

        // Create all module files
        $this->createApiRoutesFile($modulePath, $name, $plural, $group);
        $this->createController($modulePath, $name, $plural, $group);
        $this->createRepositoryInterface($modulePath, $name, $group);
        $this->createRepository($modulePath, $name, $group);
        $this->createServiceInterface($modulePath, $name, $group);
        $this->createService($modulePath, $name, $group);
        $this->createModel($modulePath, $name, $plural, $group);
        $this->createResource($modulePath, $name, $group);
        $this->createCollection($modulePath, $name, $group);
        $this->createRequest($modulePath, $name, $plural, $lower, $group);
        $this->createFacade($modulePath, $name, $plural, $group);
        $this->createRepoFacade($modulePath, $name, $plural, $group);
        $this->createTest($modulePath, $name, $plural, $group);
        $this->createMigration($modulePath, $plural);
        $this->createSeeder($modulePath, $name, $group);
        $this->createServiceProvider($modulePath, $name, $plural, $group);

        $this->info("✅ Module '{$group}{$name}' created successfully with all components!");
        $this->info("📝 Don't forget to:");
        $this->info("   1. Register the service provider in config/app.php");
        $this->info("   2. Run the migration: php artisan migrate");
        $this->info("   3. Update the model fillable fields as needed");
        $this->info("   4. Ensure SuccessResource and SuccessCollection base classes exist");
    }

    private function createApiRoutesFile(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php

use Illuminate\\Support\\Facades\\Route;
use Modules\\{$group}{$name}\\Controllers\\Api\\{$name}Controller;

Route::apiResource('{$plural}', {$name}Controller::class)->middleware(['jwt.cookies']);
";
        File::put("{$modulePath}/Routes/api.php", $content);
    }

    private function createRepositoryInterface(string $modulePath, string $name, string $group): void
    {
        $content = "<?php
namespace Modules\\{$group}{$name}\\Contracts;
use App\\Support\\Contracts\\BaseRepositoryInterface;
interface {$name}RepositoryInterface extends BaseRepositoryInterface { }
";
        File::put("{$modulePath}/Contracts/{$name}RepositoryInterface.php", $content);
    }

    private function createRepository(string $modulePath, string $name, string $group): void
    {
        $content = "<?php
namespace Modules\\{$group}{$name}\\Repositories;

use Modules\\{$group}{$name}\\Contracts\\{$name}RepositoryInterface;
use Modules\\{$group}{$name}\\Models\\{$name};
use App\\Support\\Repositories\\BaseRepository;

class {$name}Repository extends BaseRepository implements {$name}RepositoryInterface
{
    public function __construct({$name} \$model)
    {
        parent::__construct(\$model, cacheable: true);
    }
}
";
        File::put("{$modulePath}/Repositories/{$name}Repository.php", $content);
    }

    private function createRepoFacade(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php
namespace Modules\\{$group}{$name}\\Facades;
use Modules\\{$group}{$name}\\Contracts\\{$name}RepositoryInterface;
use Illuminate\\Support\\Facades\\Facade;

class {$name}RepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return {$name}RepositoryInterface::class; }
}
";
        File::put("{$modulePath}/Facades/{$name}RepoFacade.php", $content);
    }

    private function createController(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Controllers\\Api;

use App\\Http\\Controllers\\Controller;
use Modules\\{$group}{$name}\\Resources\\{$name}Resource;
use Modules\\{$group}{$name}\\Resources\\{$name}Collection;
use Modules\\{$group}{$name}\\Requests\\{$name}Request;
use Modules\\{$group}{$name}\\Facades\\{$name}Facade as {$name}Facade;
use App\\Traits\\ApiResponseTrait;
use Illuminate\\Http\\JsonResponse;
use App\\Http\\Resources\\SuccessResource;
use App\\Http\\Resources\\SuccessCollection;

class {$name}Controller extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        \$data = {$name}Facade::getAll();
        return new {$name}Collection(\$data);
    }

    public function show(int \$id): SuccessResource
    {
        \$data = {$name}Facade::getById(\$id);
        return new {$name}Resource(\$data);
    }

    public function store({$name}Request \$request): SuccessResource
    {
        \$data = {$name}Facade::store(\$request->validated());
        return new {$name}Resource(\$data, '{$name} created successfully');
    }

    public function update({$name}Request \$request, int \$id): SuccessResource
    {
        \$data = {$name}Facade::update(\$request->validated(), \$id);
        return new {$name}Resource(\$data, '{$name} updated successfully');
    }

    public function destroy(int \$id): JsonResponse
    {
        \$result = {$name}Facade::delete(\$id);
        return new JsonResponse([
            'status' => \$result,
            'code' => 204,
            'message' => \$result ? '{$name} deleted successfully' : '{$name} not found',
        ]);
    }
}
";
        File::put("{$modulePath}/Controllers/Api/{$name}Controller.php", $content);
    }

    private function createServiceInterface(string $modulePath, string $name, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Contracts;

use Illuminate\\Database\\Eloquent\\Collection;
use Modules\\{$group}{$name}\\Models\\{$name};

interface {$name}ServiceInterface
{
    public function getAll(): Collection;
    public function getById(int \$id): ?{$name};
    public function store(array \$data): {$name};
    public function update(array \$data, int \$id): {$name};
    public function delete(int \$id): bool;
}
";
        File::put("{$modulePath}/Contracts/{$name}ServiceInterface.php", $content);
    }

    private function createService(string $modulePath, string $name, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Services;

use Modules\\{$group}{$name}\\Contracts\\{$name}ServiceInterface;
use Modules\\{$group}{$name}\\Facades\\{$name}RepoFacade;
use Modules\\{$group}{$name}\\Models\\{$name};
use Illuminate\\Database\\Eloquent\\Collection;

class {$name}Service implements {$name}ServiceInterface
{
    public function getAll(): Collection
    {
        return {$name}RepoFacade::all();
    }

    public function getById(int \$id): ?{$name}
    {
        return {$name}RepoFacade::find(\$id);
    }

    public function store(array \$data): {$name}
    {
        return {$name}RepoFacade::create(\$data);
    }

    public function update(array \$data, int \$id): {$name}
    {
        return {$name}RepoFacade::update(\$id, \$data);
    }

    public function delete(int \$id): bool
    {
        return {$name}RepoFacade::delete(\$id);
    }
}
";
        File::put("{$modulePath}/Services/{$name}Service.php", $content);
    }

    private function createModel(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Models;

use Illuminate\\Database\\Eloquent\\Model;
use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;

class {$name} extends Model
{
    use HasFactory;

    protected \$table = '{$plural}';

    protected \$fillable = [
        'name',
        'code',
        'description',
        'status',
    ];

    protected \$casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
";
        File::put("{$modulePath}/Models/{$name}.php", $content);
    }

    private function createResource(string $modulePath, string $name, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Resources;

use Illuminate\\Http\\Request;
use App\\Http\\Resources\\SuccessResource;

class {$name}Resource extends SuccessResource
{
    public function toArray(Request \$request): array
    {
        return [
            'id' => \$this->id,
            'name' => \$this->name,
            'created_at' => \$this->created_at?->toISOString(),
            'updated_at' => \$this->updated_at?->toISOString(),
        ];
    }
}
";
        File::put("{$modulePath}/Resources/{$name}Resource.php", $content);
    }

    private function createCollection(string $modulePath, string $name, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Resources;

use Illuminate\\Http\\Request;
use App\\Http\\Resources\\SuccessCollection;

class {$name}Collection extends SuccessCollection
{
    public function toArray(Request \$request): array
    {
        return parent::toArray(\$request);
    }
}
";
        File::put("{$modulePath}/Resources/{$name}Collection.php", $content);
    }

    private function createRequest(string $modulePath, string $name, string $plural, string $lower, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Requests;

use Illuminate\\Foundation\\Http\\FormRequest;

class {$name}Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        \$rules = [
            'name' => ['required', 'string', 'max:255', 'unique:{$plural},name'],
            'code' => ['sometimes', 'required', 'string', 'max:255', 'unique:{$plural},code'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
            'status' => ['sometimes', 'required', 'string', 'max:255'],
        ];

        if (\$this->isMethod('PUT') || \$this->isMethod('PATCH')) {
            \$id = \$this->route('{$lower}');
            \$rules['name'] = ['sometimes', 'required', 'string', 'max:255', 'unique:{$plural},name,' . \$id];
            \$rules['code'] = ['sometimes', 'required', 'string', 'max:255', 'unique:{$plural},code,' . \$id];
        }

        return \$rules;
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'The name has already been taken.',
            'code.unique' => 'The code has already been taken.',
        ];
    }
}
";
        File::put("{$modulePath}/Requests/{$name}Request.php", $content);
    }

    private function createFacade(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php
namespace Modules\\{$group}{$name}\\Facades;

use Illuminate\\Support\\Facades\\Facade;
use Modules\\{$group}{$name}\\Contracts\\{$name}ServiceInterface;

class {$name}Facade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return {$name}ServiceInterface::class;
    }
}
";
        File::put("{$modulePath}/Facades/{$name}Facade.php", $content);
    }

    private function createTest(string $modulePath, string $name, string $plural, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Tests\\Feature;

use Tests\\TestCase;
use Illuminate\\Foundation\\Testing\\RefreshDatabase;
use Modules\\{$group}{$name}\\Models\\{$name};

class {$name}Test extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_{$plural}(): void
    {
        \$response = \$this->getJson('/api/{$plural}');
        \$response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_{$name}(): void
    {
        \$data = [
            'name' => 'Test {$name}',
            'code' => 'TST' . rand(100, 999),
        ];

        \$response = \$this->postJson('/api/{$plural}', \$data);
        \$response->assertStatus(201);

        \$this->assertDatabaseHas('{$plural}', \$data);
    }
}
";
        File::put("{$modulePath}/Tests/Feature/{$name}Test.php", $content);
    }

    private function createMigration(string $modulePath, string $plural): void
    {
        $migrationName = date('Y_m_d_His') . "_create_{$plural}_table.php";
        $content = "<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('{$plural}', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name')->unique();
            \$table->string('code')->unique();
            \$table->string('description')->nullable();
            \$table->string('status')->default('active');
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('{$plural}');
    }
};
";
        File::put("{$modulePath}/Database/Migrations/{$migrationName}", $content);
    }

    private function createSeeder(string $modulePath, string $name, string $group): void
    {
        $content = "<?php

namespace Modules\\{$group}{$name}\\Database\\Seeders;

use Illuminate\\Database\\Seeder;
use Modules\\{$group}{$name}\\Models\\{$name};

class {$name}Seeder extends Seeder
{
    public function run(): void
    {
        {$name}::create([
            'name' => 'Sample {$name}',
            'code' => 'SMPL',
        ]);
    }
}
";
        File::put("{$modulePath}/Database/Seeders/{$name}Seeder.php", $content);
    }

    private function createServiceProvider(
        string $modulePath,
        string $name,
        string $plural,
        string $group
    ): void {
        $content = "<?php
namespace Modules\\{$group}{$name}\\Providers;

use Illuminate\\Support\\ServiceProvider;
use Illuminate\\Support\\Facades\\Route;
use Modules\\{$group}{$name}\\Contracts\\{$name}ServiceInterface;
use Modules\\{$group}{$name}\\Services\\{$name}Service;
use Modules\\{$group}{$name}\\Contracts\\{$name}RepositoryInterface;
use Modules\\{$group}{$name}\\Repositories\\{$name}Repository;
use Modules\\{$group}{$name}\\Models\\{$name};

class {$name}ServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        \$this->app->singleton({$name}RepositoryInterface::class, function (\$app) {
            return new {$name}Repository(new {$name}());
        });
        \$this->app->singleton({$name}ServiceInterface::class, {$name}Service::class);
    }

    public function boot(): void
    {
        \$this->loadRoutes();
        \$this->loadMigrations();
    }

    private function loadRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../Routes/api.php');
    }

    private function loadMigrations(): void
    {
        \$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
";
        File::put("{$modulePath}/Providers/{$name}ServiceProvider.php", $content);
    }
}
