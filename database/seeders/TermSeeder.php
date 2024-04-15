<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Term::create([
            'title' => 'Definitions',
            'title_ar' => 'التعاريف',
            'body' => '• Institution: Institution (write the name of the institution).
• Arhaboa platform: An electronic platform that aims to serve event owners (such as: wedding, engagement, graduation, etc.) to overcome the difficulties that they may encounter during the process of managing and directing invitations to the invitees.
• User: Any person who uses the Arhaboo platform as a visitor, as an event host, as an additional invitee, as an invitee, as a gatekeeper, or As a card designer.',
            'body_ar' => '• المؤسسة: مؤسسة (نكتب اسم المؤسسة ) .
• منصة  آرحبوا: منصة إلكترونية تهدف إلى خدمة أصحاب المناسبات (مثل: حفل الزفاف، الخطبة، التخرج، إلخ) للتغلب على الصعوبات التي من الممكن أن تواجههم خلال عملية إدارة وتوجيه الدعوات إلى المدعوين.
• المستخدم: أي شخص يقوم باستخدام منصة  آرحبوا كزائر أو كصاحب مناسبة أو كداعي إضافي أو كمدعو أو كحارس بوابة أو كمصمم بطاقات.',
        ]);

        Term::create([
            'title' => 'Introduction',
            'title_ar' => 'المقدمة',
            'body' => 'We welcome you, and thank you for using the Arhaboo platform, with its products, services, and features.

The following controls and conditions represent an official agreement (contract) between the organization and the users of the Arhaboo platform. Your use of the Welcome platform also constitutes your acceptance of this contract and its provisions without restriction or condition. Accordingly, you must not use it if you do not agree to the terms and conditions contained in this contract.

The organization reserves the right to amend or change these terms and conditions from time to time without prior notice, in order to provide better service and higher quality. It is your responsibility as a user of the Arhaboo platform to review the terms and conditions of use periodically to know the updates that occur to them, and your continued use constitutes your full agreement to all Changes are made, we hope you review our Privacy Policy to learn more about how the organization uses the information provided by users. Note that any violation of this contract by the user may subject his account to suspension without prior notice and without any refundable amounts in some cases.',
            'body_ar' => 'نرحب بك، ونشكرك على استخدام منصة  آرحبوا بما تتضمنه من منتجات وخدمات ومميزات.

إن الضوابط والشروط التالية تمثل اتفاق رسمي (عقد) بين المؤسسة ومستخدمي منصة  آرحبوا. كما يشكل استخدامك لمنصة  آرحبوا موافقة منك على هذا العقد وأحكامه دون قيد أو شرط، وتبعاً لذلك يجب عليك عدم استخدامها في حال لم تكن موافقاً على الأحكام والشروط الواردة في هذا العقد.

تحتفظ المؤسسة بحق تعديل أو تغيير هذه الأحكام والشروط من حين لآخر دون إشعار مسبق، وذلك من أجل خدمة أفضل وجودة أعلى، ويكون من مسؤوليتك كمستخدم لمنصة  آرحبوا مراجعة شروط وأحكام الاستخدام بشكل دوري لمعرفة التحديثات التي تطرأ عليها، كما يشكل استخدامك المستمر موافقتك التامة على كل التغييرات التي يتم إجراؤها، ونأمل مراجعة سياسة الخصوصية لدينا لمعرفة المزيد حول كيفية استخدام المؤسسة للمعلومات التي تقدم من قبل المستخدمين. علماً بأن أي مخالفة لهذا العقد من قبل المستخدم قد تعرض حسابه للإيقاف دون إشعار مسبق وبلا أي مبالغ مسترجعة في بعض الحالات.
',
        ]);

        Term::create([
            'title' => 'Language of terms',
            'title_ar' => 'لغة الشروط',
            'body' => '• Where we provide you with a translation of the Arabic version of the Terms, you agree that the translation may be provided for your convenience only and that the Arabic version of the Terms is the version that will depend on and govern your relationship with the Corporation.
• In the event of any contradiction between what is contained in the Arabic version of the terms and what is contained in the translation, what is contained in the Arabic version will be the reliable reference.',
            'body_ar' => '• حيثما نوفر لك ترجمة للنسخة العربية من الشروط، فإنك توافق على أن الترجمة قد يتم توفيرها للتسهيل عليك فقط وأن النسخة العربية للشروط هي النسخة التي سوف تعتمد وتحكم علاقتك بـالمؤسسة.
• في حالة وجود أي تناقض بين ما هو وارد في النسخة العربية من الشروط وما هو وارد في الترجمة، سيكون ما هو وارد في النسخة العربية المرجع الذي يعتد به.
',
        ]);

        Term::create([
            'title' => 'Modifications',
            'title_ar' => 'التعديلات',
            'body' => 'The Foundation has the right to update the Arhaboa platform from time to time, and it may also change any of its contents at its sole discretion, or change, suspend or discontinue any service (including, but not limited to, providing any feature, database or content) in any At any time, by posting a notification on the platform or by sending a notification to you via mobile phone or email. The Organization may also impose limits on certain features and services or limit your access to parts or all of the Arhaboo Platform without notice or liability. It should also be taken into account that the content of the Arhaboo platform may not be up to date at all times. The Foundation also does not guarantee that the Arhaboo platform or any of its contents are free of any error or incorrect information.
​',
            'body_ar' => 'يحق للمؤسسة تحديث منصة  آرحبوا من وقت لآخر، كما يجوز لها تغيير أي من محتوياتها من وفق تقديرها الخاص، أو تغيير أي خدمة أو تعليقها أو إيقافها (بما في ذلك على سبيل المثال لا الحصر، توفير أي ميزة أو قاعدة بيانات أو محتوى) في أي وقت، وذلك بنشر إخطار على المنصة أو بإرسال إخطار لك عبر الجوال أو البريد الإلكتروني. كما يجوز للمؤسسة أن تضع قيودًا على ميزات وخدمات مُعيَّنة أو تحد من وصولك إلى أجزاء من منصة  آرحبوا أو بأكملها دون إخطار أو مسؤولية. كذلك يجب مراعاة أن محتوى منصة  آرحبوا قد لا يكون محدثا في جميع الأوقات. كما لا تضمن المؤسسة خلو منصة  آرحبوا أو أي من محتوياتها من أي خطأ أو معلومات غير صحيحة.',
        ]);

        Term::create([
            'title' => 'Users who are eligible to use the Arhaboo platform',
            'title_ar' => 'المستخدمون المؤهلون لاستخدام منصة ارحبو',
            'body' => '• Permissible age:
You must be at least 13 years old to use the Arhaboo platform.

• Obtain permission from a parent or legal guardian:
If you are under 18 years of age, you must obtain permission from a parent or legal guardian to use the Arhaboo platform. Please ask them to read this contract with you. If you are a parent or legal guardian of a user under the age of 18, by allowing your child to use the Arhabooa Platform, you are bound by the provisions of this contract and responsible for his or her use of the Arhabooa Platform.

• Commercial activities:
If you are using the Arhaboa platform on behalf of a company, institution, government entity, or private, for-profit or non-profit facility, you pledge to us that you have the authority to act on behalf of this entity and confirm to us that this entity agrees to this contract.',
            'body_ar' => '
• السن المسموح به:
يجب أن تبلغ من العمر 13 عامًا على الأقل لتتمكن من استخدام منصة  آرحبوا.

• الحصول على إذن من أحد الوالدَين أو الوصي القانوني:
إذا كان عمرك أقل من 18 عامًا، يجب الحصول على إذن من أحد الوالدَين أو الوصي القانوني لاستخدام منصة  آرحبوا. يرجى مطالبتهم بقراءة هذا العقد معك. إذا كنت أحد الوالدين أو الوصي القانوني لمستخدم يقل عمره عن 18 عامًا، فبالسماح لطفلك باستخدام منصة  آرحبوا، فإنك ملتزم بأحكام هذا العقد ومسؤول عن استخدامه لمنصة  آرحبوا.

• الأنشطة التجارية:
إذا كنت تستخدم منصة  آرحبوا نيابةً عن شركة أو مؤسسة أو جهة حكومية أو منشأة خاصة ربحية أو غير ربحية، فإنك تتعهد لنا أن لديك الصلاحية للتصرف نيابةً عن هذا الكيان وتؤكد لنا موافقة هذا الكيان على هذا العقد.
',
        ]);

        Term::create([
            'title' => 'Entitlement to services',
            'title_ar' => 'أحقية الحصول على الخدمات',
            'body' => 'To obtain the Services, Products and Features, you represent and warrant that:
• Your use of the Arhaboo platform has never been disabled or prevented from using it at any time.
• You are not a competitor to the Arhaboo platform, nor do you offer any product competing with the services, products, and features provided by the organization.
• That you have full legal capacity to contract and that you will not be in violation of any law or contract.',
            'body_ar' => 'للحصول على الخدمات والمنتجات والمميزات، أنت تقر وتضمن التالي:
• أنه لم يسبق أن تم تعطيل استخدامك لمنصة  آرحبوا أو منعك من استخدامها في أي وقت من الأوقات.
• أنك لست منافساً لمنصة  آرحبوا، كما أنك لا تقدم أي منتج منافس للخدمات والمنتجات والمميزات المقدمة من قبل المؤسسة.
• أنك تتمتع بكامل الأهلية الشرعية للتعاقد وأنك بذلك لن تكون منتهكاً لأي قانون أو عقد.
',
        ]);

        Term::create([
            'title' => 'Pledges and guarantees',
            'title_ar' => 'التعهدات والضمانات',
            'body' => 'To obtain the Services, Products and Features, you represent and warrant that you will:
• Comply with all applicable laws and regulations in the Kingdom of Saudi Arabia.
• Provides correct information and updates it periodically.
• Review and comply with any notices sent by the organization regarding your use of the Arhaboa platform.
• You will use the Arhaboo platform for legitimate purposes only, and will not use it to purchase or receive any illegal materials or for the purpose of fraud.
• You will not use the Arhaboo platform to cause harm, harassment, or inconvenience to anyone.
• You agree to exchange information between companies and relevant parties within the Arhaboa platform regarding your executed operations and evaluation of transactions with you.
• Will not interfere with the proper operation of the Arhaboo platform.
• You will not attempt to harm the Welcome platform in any way.
• You will not copy or distribute any of the contents of the Arhaboa platform without obtaining written permission from the organization.
• You will keep your account password or any identification method we provide you that allows access to your account secure and confidential.
• You will provide us with all evidence proving your identity at the institution’s sole discretion.
• The organization has the right to refuse to provide use of the Arhaboa platform without giving any reasons.',
            'body_ar' => 'للحصول على الخدمات والمنتجات والمميزات، أنت تقر وتضمن بأنك سوف:
• تمتثل لكافة القوانين واللوائح المعمول بها في المملكة العربية السعودية.
• تقدم معلومات صحيحة وتقوم بتحديثها بشكل دوري.
• تراجع وتمتثل لأي إشعارات يتم إرسالها من قبل المؤسسة فيما يتعلق باستخدامك لمنصة  آرحبوا.
• سوف تستخدم منصة  آرحبوا لأغراض مشروعة فقط، ولن تستخدمها لشراء أو استلام أي مواد غير قانونية أو بهدف الاحتيال.
• لن تستخدم منصة  آرحبوا للتسبب بإيذاء أو مضايقة أو إزعاج أحد ما.
• توافق على تبادل المعلومات بين الشركات والجهات ذات العلاقة داخل منصة  آرحبوا فيما يخص عملياتك المنفذة وتقييم التعاملات معك.
• لن تعرقل التشغيل السليم لمنصة  آرحبوا.
• لن تحاول إلحاق الضرر لمنصة  آرحبوا بأي شكل من الأشكال.
• لن تنسخ أو توزع أي من محتويات منصة  آرحبوا دون الحصول على إذن كتابي من المؤسسة.
• سوف تحافظ على كلمة المرور لحسابك أو أي وسيلة تعريف نقدمها لك وتتيح الدخول إلى حسابك، بشكلٍ آمن وسري.
• سوف تقدم لنا كافة الدلائل التي تثبت هويتك وفقاً لتقدير المؤسسة الخاص.
• يحق للمؤسسة رفض إتاحة استخدام منصة  آرحبوا دون إبداء أي أسباب.
',
        ]);
    }
}
