import os
import re

def snake_to_camel(word):
    components = word.split('_')
    return components[0] + ''.join(x.title() for x in components[1:])

resource_files = [
    "app/Modules/School/AcademicClass/Resources/AcademicClassResource.php",
    "app/Modules/School/AcademicSession/Resources/AcademicSessionResource.php",
    "app/Modules/School/AcademicStandard/Resources/AcademicStandardResource.php",
    "app/Modules/School/Admission/Resources/AdmissionResource.php",
    "app/Modules/School/Book/Resources/BookResource.php",
    "app/Modules/School/BookChapter/Resources/BookChapterResource.php",
    "app/Modules/School/BookModule/Resources/BookModuleResource.php",
    "app/Modules/School/Building/Resources/BuildingResource.php",
    "app/Modules/School/Campus/Resources/CampusResource.php",
    "app/Modules/School/EducationBoard/Resources/EducationBoardResource.php",
    "app/Modules/School/Examination/Resources/ExaminationResource.php",
    "app/Modules/School/ExaminationResult/Resources/ExaminationResultResource.php",
    "app/Modules/School/ExaminationSchedule/Resources/ExaminationScheduleResource.php",
    "app/Modules/School/ExaminationStandard/Resources/ExaminationStandardResource.php",
    "app/Modules/School/ExaminationType/Resources/ExaminationTypeResource.php",
    "app/Modules/School/Expense/Resources/ExpenseResource.php",
    "app/Modules/School/ExpenseGroup/Resources/ExpenseGroupResource.php",
    "app/Modules/School/ExpenseHead/Resources/ExpenseHeadResource.php",
    "app/Modules/School/ExpenseItem/Resources/ExpenseItemResource.php",
    "app/Modules/School/Fee/Resources/FeeResource.php",
    "app/Modules/School/FeeFeeReceipt/Resources/FeeFeeReceiptResource.php",
    "app/Modules/School/FeeHead/Resources/FeeHeadResource.php",
    "app/Modules/School/FeeItem/Resources/FeeItemResource.php",
    "app/Modules/School/FeeItemMonth/Resources/FeeItemMonthResource.php",
    "app/Modules/School/FeeReceipt/Resources/FeeReceiptResource.php",
    "app/Modules/School/FeeRule/Resources/FeeRuleResource.php",
    "app/Modules/School/FeeTemplate/Resources/FeeTemplateResource.php",
    "app/Modules/School/FeeTemplateItem/Resources/FeeTemplateItemResource.php",
    "app/Modules/School/Floor/Resources/FloorResource.php",
    "app/Modules/School/Guardian/Resources/GuardianResource.php",
    "app/Modules/School/IncomeGroup/Resources/IncomeGroupResource.php",
    "app/Modules/School/Month/Resources/MonthResource.php",
    "app/Modules/School/Promotion/Resources/PromotionResource.php",
    "app/Modules/School/Room/Resources/RoomResource.php",
    "app/Modules/School/Section/Resources/SectionResource.php",
    "app/Modules/School/Student/Resources/StudentResource.php",
    "app/Modules/School/StudentSession/Resources/StudentSessionResource.php",
    "app/Modules/School/Subject/Resources/SubjectResource.php",
    "app/Modules/School/SubjectGroup/Resources/SubjectGroupResource.php",
    "app/Modules/School/Teacher/Resources/TeacherResource.php"
]

date_fields_suffixes = ['_at', '_date']
specific_date_fields = ['dob', 'doj']

for res_path in resource_files:
    # Get module name
    parts = res_path.split('/')
    module_name = parts[3]
    
    # Locate model
    model_path = f"app/Modules/School/{module_name}/Models/{module_name}.php"
    if not os.path.exists(model_path):
        # Try finding any .php in Models directory
        models_dir = f"app/Modules/School/{module_name}/Models/"
        if os.path.exists(models_dir):
            models = [f for f in os.listdir(models_dir) if f.endswith('.php')]
            if models:
                # Use the one that matches module_name or just the first one if only one
                matched = [m for m in models if m.replace('.php', '') == module_name]
                if matched:
                    model_path = os.path.join(models_dir, matched[0])
                elif len(models) == 1:
                    model_path = os.path.join(models_dir, models[0])
                else:
                    # Specific check for FeeItemMonth where model is FeeItemMonth.php
                    model_path = os.path.join(models_dir, module_name + ".php")
                    if not os.path.exists(model_path):
                        print(f"Could not reliably find model for {module_name}")
                        continue
            else:
                print(f"No model found for {module_name}")
                continue
        else:
            print(f"Models directory not found for {module_name}")
            continue

    # Read Model
    try:
        with open(model_path, 'r') as f:
            model_content = f.read()
    except Exception as e:
        print(f"Error reading {model_path}: {e}")
        continue
    
    # Extract fillable
    fillable_match = re.search(r'protected\s+\$fillable\s*=\s*\[(.*?)\];', model_content, re.DOTALL)
    if not fillable_match:
        print(f"No fillable fields found in {model_path}")
        fillable_fields = []
    else:
        fillable_raw = fillable_match.group(1)
        # Handle both single and double quotes, and trailing commas
        fillable_fields = re.findall(r"['\"]([^'\"]+)['\"]", fillable_raw)

    # Fields to include
    fields = ['id'] + fillable_fields + ['created_at', 'updated_at']
    # Deduplicate while preserving order
    seen = set()
    fields = [x for x in fields if not (x in seen or seen.add(x))]

    # Construct toArray content
    to_array_lines = []
    for field in fields:
        camel_key = snake_to_camel(field)
        is_date = any(field.endswith(suffix) for suffix in date_fields_suffixes) or field in specific_date_fields
        
        if is_date:
            line = f"            '{camel_key}' => $this->{field}?->toISOString(),"
        else:
            line = f"            '{camel_key}' => $this->{field},"
        to_array_lines.append(line)

    new_to_array = "    public function toArray(Request $request): array\n    {\n        return [\n" + "\n".join(to_array_lines) + "\n        ];\n    }"

    # Read Resource
    try:
        with open(res_path, 'r') as f:
            res_content = f.read()
    except Exception as e:
        print(f"Error reading {res_path}: {e}")
        continue

    # Replace toArray method
    # Use a more robust regex for toArray
    pattern = r'public\s+function\s+toArray\(Request\s+\$request\):\s+array\s*\{.*?\}\s*\}'
    # Actually, the closing brace of toArray and then the closing brace of the class.
    # Let's try to find toArray method specifically.
    
    updated_res_content = re.sub(
        r'public\s+function\s+toArray\(Request\s+\$request\):\s+array\s*\{(?:[^{}]*|\{(?:[^{}]*|\{[^{}]*\})*\})*\}',
        new_to_array,
        res_content,
        flags=re.DOTALL
    )

    if updated_res_content == res_content:
        # Fallback for simpler match if the nested one fails
        updated_res_content = re.sub(
            r'public\s+function\s+toArray\(Request\s+\$request\):\s+array\s*\{.*?\}',
            new_to_array,
            res_content,
            flags=re.DOTALL
        )

    # Write Resource
    try:
        with open(res_path, 'w') as f:
            f.write(updated_res_content)
        print(f"Updated {res_path}")
    except Exception as e:
        print(f"Error writing to {res_path}: {e}")
