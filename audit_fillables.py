import os
import re

modules = [
    "EducationBoard", "Examination", "ExaminationResult", "ExaminationSchedule", 
    "ExaminationStandard", "ExaminationType", "Expense", "ExpenseGroup", "ExpenseHead", 
    "ExpenseItem", "Fee", "FeeFeeReceipt", "FeeHead", "FeeItem", "FeeItemMonth", 
    "FeeReceipt", "FeeRule", "FeeTemplate", "FeeTemplateItem", "Floor", "Guardian", 
    "IncomeGroup", "Month", "Promotion", "Room", "Section", "Student", "StudentSession", 
    "Subject", "SubjectGroup", "Teacher"
]

def get_fillable(model_path):
    if not os.path.exists(model_path): return None
    with open(model_path, 'r') as f:
        content = f.read()
        match = re.search(r'$fillable\s*=\s*\[(.*?)\]', content, re.DOTALL)
        if match:
            return [x.strip().strip("'").strip('"') for x in match.group(1).split(',')]
    return []

def get_columns(migration_path):
    if not os.path.exists(migration_path): return None
    cols = []
    with open(migration_path, 'r') as f:
        content = f.read()
        # Look for ->column('name') or ->column('name', ...)
        matches = re.findall(r'->[a-z_]+\s*\(\s*[\'"]([a-z_]+)[\'"]', content)
        for m in matches:
            if m not in ['id', 'created_at', 'updated_at', 'deleted_at', 'remember_token', 'password', 'email_verified_at']:
                cols.append(m)
    return list(set(cols))

def find_migration(module_name):
    base_dir = f"app/Modules/School/{module_name}/Database/Migrations"
    if os.path.exists(base_dir):
        files = os.listdir(base_dir)
        if files: return os.path.join(base_dir, files[0])
    return None

def find_model(module_name):
    model_path = f"app/Modules/School/{module_name}/Models/{module_name}.php"
    if os.path.exists(model_path): return model_path
    # Try different naming/structure if needed
    return None

results = []
for m in modules:
    migration = find_migration(m)
    model = find_model(m)
    if migration and model:
        cols = get_columns(migration)
        fillable = get_fillable(model)
        missing = [c for c in cols if c not in fillable]
        results.append((m, missing))

for m, missing in results:
    if missing:
        print(f"Module {m}: Missing in fillable: {missing}")
    else:
        print(f"Module {m}: OK")
