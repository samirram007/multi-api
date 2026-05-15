import os
import re

files = [
    "app/Modules/School/AcademicSession/Facades/AcademicSessionFacade.php",
    "app/Modules/School/AcademicStandard/Facades/AcademicStandardFacade.php",
    "app/Modules/School/Admission/Facades/AdmissionFacade.php",
    "app/Modules/School/Building/Facades/BuildingFacade.php",
    "app/Modules/School/Campus/Facades/CampusFacade.php",
    "app/Modules/School/EducationBoard/Facades/EducationBoardFacade.php",
    "app/Modules/School/Examination/Facades/ExaminationFacade.php",
    "app/Modules/School/ExaminationResult/Facades/ExaminationResultFacade.php",
    "app/Modules/School/ExaminationSchedule/Facades/ExaminationScheduleFacade.php",
    "app/Modules/School/ExaminationStandard/Facades/ExaminationStandardFacade.php",
    "app/Modules/School/ExaminationType/Facades/ExaminationTypeFacade.php",
    "app/Modules/School/Expense/Facades/ExpenseFacade.php",
    "app/Modules/School/ExpenseGroup/Facades/ExpenseGroupFacade.php",
    "app/Modules/School/ExpenseHead/Facades/ExpenseHeadFacade.php",
    "app/Modules/School/Fee/Facades/FeeFacade.php",
    "app/Modules/School/FeeHead/Facades/FeeHeadFacade.php",
    "app/Modules/School/FeeItem/Facades/FeeItemFacade.php",
    "app/Modules/School/FeeItemMonth/Facades/FeeItemMonthFacade.php",
    "app/Modules/School/FeeRule/Facades/FeeRuleFacade.php",
    "app/Modules/School/FeeTemplate/Facades/FeeTemplateFacade.php",
    "app/Modules/School/Floor/Facades/FloorFacade.php",
    "app/Modules/School/Guardian/Facades/GuardianFacade.php",
    "app/Modules/School/IncomeGroup/Facades/IncomeGroupFacade.php",
    "app/Modules/School/Teacher/Facades/TeacherFacade.php"
]

for file_path in files:
    if not os.path.exists(file_path):
        print(f"File not found: {file_path}")
        continue
    
    with open(file_path, 'r') as f:
        content = f.read()
    
    # Extract module name from path
    match = re.search(r'app/Modules/School/(.*?)/Facades/', file_path)
    if not match:
        continue
    module_name = match.group(1)
    interface_name = f"{module_name}ServiceInterface"
    interface_full_class = f"Modules\\School\\{module_name}\\Contracts\\{interface_name}"
    
    # Add import if missing
    if f"use {interface_full_class};" not in content:
        # Use a literal replacement for the interface_full_class to avoid regex escape issues
        replacement = r'\1\n        use ' + interface_full_class.replace('\\', '\\\\') + ';'
        content = re.sub(r'(use Illuminate\\Support\\Facades\\Facade;)', replacement, content)
    
    # Update getFacadeAccessor
    content = re.sub(r"return '.*?';", f"return {interface_name}::class;", content)
    
    with open(file_path, 'w') as f:
        f.write(content)
    print(f"Processed {file_path}")
