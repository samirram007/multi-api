import os
import re

files = [
    "app/Modules/School/AcademicSession/Providers/AcademicSessionServiceProvider.php",
    "app/Modules/School/AcademicStandard/Providers/AcademicStandardServiceProvider.php",
    "app/Modules/School/Admission/Providers/AdmissionServiceProvider.php",
    "app/Modules/School/Building/Providers/BuildingServiceProvider.php",
    "app/Modules/School/Campus/Providers/CampusServiceProvider.php",
    "app/Modules/School/EducationBoard/Providers/EducationBoardServiceProvider.php",
    "app/Modules/School/Examination/Providers/ExaminationServiceProvider.php",
    "app/Modules/School/ExaminationResult/Providers/ExaminationResultServiceProvider.php",
    "app/Modules/School/ExaminationSchedule/Providers/ExaminationScheduleServiceProvider.php",
    "app/Modules/School/ExaminationStandard/Providers/ExaminationStandardServiceProvider.php",
    "app/Modules/School/ExaminationType/Providers/ExaminationTypeServiceProvider.php",
    "app/Modules/School/Expense/Providers/ExpenseServiceProvider.php",
    "app/Modules/School/ExpenseGroup/Providers/ExpenseGroupServiceProvider.php",
    "app/Modules/School/ExpenseHead/Providers/ExpenseHeadServiceProvider.php",
    "app/Modules/School/Fee/Providers/FeeServiceProvider.php",
    "app/Modules/School/FeeHead/Providers/FeeHeadServiceProvider.php",
    "app/Modules/School/FeeItem/Providers/FeeItemServiceProvider.php",
    "app/Modules/School/FeeItemMonth/Providers/FeeItemMonthServiceProvider.php",
    "app/Modules/School/FeeRule/Providers/FeeRuleServiceProvider.php",
    "app/Modules/School/FeeTemplate/Providers/FeeTemplateServiceProvider.php",
    "app/Modules/School/Floor/Providers/FloorServiceProvider.php",
    "app/Modules/School/Guardian/Providers/GuardianServiceProvider.php",
    "app/Modules/School/IncomeGroup/Providers/IncomeGroupServiceProvider.php",
    "app/Modules/School/Student/Providers/StudentServiceProvider.php",
    "app/Modules/School/Teacher/Providers/TeacherServiceProvider.php"
]

for file_path in files:
    if not os.path.exists(file_path):
        print(f"File not found: {file_path}")
        continue
    
    with open(file_path, 'r') as f:
        content = f.read()
    
    # Replace bind with singleton for the interface
    content = re.sub(r'\$this->app->bind\((.*?ServiceInterface::class), (.*?Service::class)\);', 
                     r'$this->app->singleton(\1, \2);', content)
    
    # Remove string-key singleton bindings
    content = re.sub(r"\$this->app->singleton\('[a-z_]+', function \(\$app\) \{.*?\}\);", "", content, flags=re.DOTALL)
    
    # Clean up multiple newlines that might have been left
    content = re.sub(r'\n\s*\n\s*\n', '\n\n', content)
    
    with open(file_path, 'w') as f:
        f.write(content)
    print(f"Processed {file_path}")
