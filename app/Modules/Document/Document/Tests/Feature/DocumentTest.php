<?php



namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
use App\Models\Document; // Assuming this model exists
use Illuminate\Foundation\Testing\RefreshDatabase;



class DocumentServiceTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Setup the test environment with necessary users and initial data.
     */
    protected function setUp(): void
    {











        parent::setUp();
        // Create a standard user that can perform actions
        $this->user = User::factory()->create();
    }

    /**
     * Test Case 1: Successful creation of a new document.
     * @test
     */
    public function test_document_can_be_created_successfully()
    {















        $payload = [
            'title' => 'Quarterly Report Q3',
            'content' => 'Detailed metrics for Q3.',
            'user_id' => $this->user->id,
        ];

        // Assuming the service layer handles the actual creation logic
        $document = \App\Services\DocumentService::createDocument($payload);

        $this->assertInstanceOf(Document::class, $document);
        $this->assertEquals($payload['title'], $document->title);
        $this->assertEquals($payload['user_id'], $document->user_id);
    }

    /**
     * Test Case 2: Attempting to create a document with missing required fields.
     * @test
     */
    public function test_document_creation_fails_with_missing_data()
    {















        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Title and content are required');

        // Test failure case
        \App\Services\DocumentService::createDocument([
            'title' => '', // Missing
            'content' => 'Some content',
            'user_id' => $this->user->id,
        ]);
    }


    /**
     * Test Case 3: Retrieving a document by ID.
     * @test
     */
    public function test_document_can_be_retrieved_by_id()
    {
















        $document = Document::factory()->create(['user_id' => $this->user->id]);

        // Assuming retrieval method exists
        $retrievedDocument = \App\Services\DocumentService::getDocumentById($document->id);

        $this->assertInstanceOf(Document::class, $retrievedDocument);
        $this->assertEquals($document->id, $retrievedDocument->id);
    }

    /**
     * Test Case 4: Updating an existing document's content.
     * @test
     */
    public function test_document_can_be_updated()
    {

        $document = Document::factory()->create(['user_id' => $this->user->id]);
        $newContent = 'Updated content for Q4 analysis.';













        // Assuming the service uses the authenticated user's context for updates
        $updatedDocument = \App\Services\DocumentService::updateDocument($document->id, [
            'content' => $newContent
        ], $this->user);

        $this->assertInstanceOf(Document::class, $updatedDocument);
        $this->assertEquals($newContent, $updatedDocument->content);
    }

    /**
     * Test Case 5: Authorization check - user cannot update another user's document.
     * @test
     */
    public function test_unauthorized_user_cannot_update_document()
    {



        // Setup: Document owned by user A
        $owner = User::factory()->create();
        $document = Document::factory()->create(['user_id' => $owner->id]);

        // Setup: Attacker user B (the authenticated user for this test)
        $attacker = $this->user;

        // Expecting an authorization exception
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);

        // Attempt update using the service but with wrong ownership context
        \App\Services\DocumentService::updateDocument($document->id, [
            'content' => 'Hacked content'
        ], $attacker);
    }

    /**
     * Test Case 6: Deleting a document that belongs to the user.
     * @test
     */
    public function test_document_can_be_deleted()
    {
        $document = Document::factory()->create(['user_id' => $this->user->id]);

        // Assuming the service handles deletion logic
        \App\Services\DocumentService::deleteDocument($document->id, $this->user);

        $this->assertDatabaseMissing('documents', ['id' => $document->id]);
    }
}
