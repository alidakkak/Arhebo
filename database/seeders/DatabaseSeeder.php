<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AboutApp;
use App\Models\ContactUs;
use App\Models\FrequentlyAskedQuestion;
use App\Models\PrivacyPolicy;
use App\Models\ProhibitedThing;
use App\Models\Term;
use App\Statuses\UserTypes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0937356470',
            'password' => '00000000',
            'type' => UserTypes::SUPER_ADMIN,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Support',
            'email' => 'support@gmail.com',
            'phone' => '0937356470',
            'password' => '00000000',
            'type' => UserTypes::SUPPORT,
        ]);

        ProhibitedThing::create([
            'name' => 'Children are not allowed',
            'name_ar' => 'ممنوع اصطحاب الأطفال',
        ]);

        ProhibitedThing::create([
            'name' => 'Mobile photography is not allowed',
            'name_ar' => 'ممنوع تصوير',
        ]);

        FrequentlyAskedQuestion::create([
            'question' => 'Is it possible to modify the event data after sending invitations?',
            'answer' => 'Yes, it is possible to modify the event data, but modification is not permitted if there are less than 72 hours left until the event is held.',
            'question_ar' => 'هل يمكن التعديل على بيانات المناسبة بعد إرسال الدعوات؟',
            'answer_ar' => 'نعم، يمكن التعديل على بيانات المناسبة، لكن لا يسمح بالتعديل في حال تبقى على انعقاد المناسبة أقل من 72 ساعة.',
        ]);

        FrequentlyAskedQuestion::create([
            'question' => 'Is it possible to locate the event on a map?',
            'answer' => 'Yes, invitees can locate the event on Google Maps.',
            'question_ar' => 'هل من الممكن تحديد موقع المناسبة على الخريطة؟',
            'answer_ar' => 'نعم، يمكن تحديد موقع المناسبة للمدعوين على خرائط قوقل',
        ]);

        FrequentlyAskedQuestion::create([
            'question' => 'Is it possible to delete the event after sending invitations?',
            'answer' => 'Yes, the event can be deleted, but deletion is not permitted if the event is scheduled to take place for less than 72 hours',
            'question_ar' => 'هل بالإمكان حذف المناسبة بعد إرسال الدعوات؟',
            'answer_ar' => 'نعم، يمكن حذف المناسبة ولكن لا يسمح بالحذف في حال تبقى على انعقاد المناسبة أقل من 72 ساعة',
        ]);

        FrequentlyAskedQuestion::create([
            'question' => 'Does Welcome have a supervisor for the portal?',
            'answer' => 'No, we do not currently have a portal supervisor, but we are working on it, and our supervisors will be chosen with great care so that you have a wonderful experience.',
            'question_ar' => 'هل يتوفر لدى ارحبو مشرف/ـة للبوابة؟',
            'answer_ar' => 'لا لا يتوفر لدينا مشرف بوابة حالياً ولكننا نعمل على ذلك، وسيتم اختيار مشرفينا بعناية تامة لتحصلوا على تجربة رائعة.',
        ]);

        FrequentlyAskedQuestion::create([
            'question' => 'What are the extent of the powers of the portal supervisor in managing the event and invitations?',
            'answer' => 'The portal supervisor can read the QR code for event invitations only through the application or device designated for that purpose, and view the total number of attendees (those whose code was read) and the remaining number of invitees.',
            'question_ar' => 'ما مدى صلاحيات مشرفـ/ـة البوابة في إدارة المناسبة والدعوات؟',
            'answer_ar' => 'يمُكن لمشرفـ/ـة البوابة قراءة (كود QR) لدعوات المناسبة فقط عن طريق طريق التطبيق أو الجهاز المخصص لذلك، والاطلاع على إجمالي عدد الحضور (من تم قراءة الكود الخاص بهم) والعدد المتبقي من المدعوين.',
        ]);

        AboutApp::create([
            'title' => 'who are we :',
            'title_ar' => 'من نحن :',
            'body_ar' => 'نحن منصة آرحبوا، مشروع مبتكر تأسس برؤية استثنائية لتحسين تجربة إعداد وإرسال الدعوات. نعكس التفاني في تقديم حلاً إلكترونيًا شاملاً للتحديات المتعلقة بالدعوات الورقية، مع التركيز على احتياجات المجتمع السعودي والخليجي.',
            'body' => 'We are the Welcome platform, an innovative project founded with an exceptional vision to improve the experience of preparing and sending invitations. We reflect dedication to providing a comprehensive electronic solution to the challenges related to paper invitations, with a focus on the needs of the Saudi and Gulf community.',
        ]);

        AboutApp::create([
            'title' => 'Our vision :',
            'title_ar' => 'رؤيتنا :',
            'body_ar' => 'تتمثل رؤيتنا في تحويل عملية إرسال وإدارة الدعوات إلى تجربة إلكترونية سهلة وممتعة، مع التركيز الدائم على التفاصيل والإبداع.',
            'body' => 'Our vision is to transform the process of sending and managing invitations into an easy and enjoyable online experience, with a constant focus on detail and creativity.',
        ]);

        AboutApp::create([
            'title' => 'Our message :',
            'title_ar' => 'رسالتنا :',
            'body_ar' => 'رسالتنا تتمثل في جعل لحظاتك استثنائية وتجاربك لا تُنسى، حيث نعمل بكل اجتهاد لتحويل أفكارك إلى واقع ملموس، مع التركيز على التفاصيل التي تميزنا.',
            'body' => 'Our mission is to make your moments exceptional and your experiences unforgettable, as we work hard to transform your ideas into reality, focusing on the details that set us apart.',
        ]);

        AboutApp::create([
            'title' => 'Our goals :',
            'title_ar' => 'أهدافنا :',
            'body_ar' => 'تحقيق رضا العملاء: نسعى جاهدين لتحقيق توقعات ورغبات عملائنا وضمان رضاهم الكامل.
التفرد في التصميم: نسعى لتقديم تصاميم فريدة تعبر عن هوية وأسلوب كل عميل.
التطور والابتكار: نعمل بجد للبقاء على اطلاع دائم على أحدث التطورات وتقديم حلول مبتكرة.                          ',
            'body' => 'Achieving customer satisfaction: We strive to fulfill the expectations and desires of our customers and ensure their complete satisfaction.
Uniqueness in design: We strive to provide unique designs that express the identity and style of each client.
Development and Innovation: We work hard to stay up to date on the latest developments and provide innovative solutions.',
        ]);

        AboutApp::create([
            'title' => 'Rate us :',
            'title_ar' => 'قيمنا :',
            'body_ar' => 'الالتزام بالجودة: نسعى دائمًا لتحقيق أعلى معايير الجودة في كل تفاصيل عملنا.
التعاون والفريق: نؤمن بأهمية العمل كفريق، ونقدر التعاون المستمر لتحقيق النجاح.
الشفافية والأمانة: نلتزم بالشفافية والأمانة في كل عملية تنظيم، بناءً على الثقة المبنية مع عملائنا',
            'body' => 'Commitment to quality: We always strive to achieve the highest quality standards in every detail of our work.
Collaboration and Team: We believe in the importance of working as a team, and we value continuous cooperation to achieve success.
Transparency and honesty: We are committed to transparency and honesty in every regulatory process, based on the trust built with our clients',
        ]);

        ContactUs::create([
            'phone' => '096532456',
            'email' => 'arhbo@gmail.com',
            'facebook' => 'facebook.linc',
            'instagram' => 'instagram.linc',
            'whatsapp' => 'whatsapp',
            'x' => 'x.linc'
        ]);

        Term::create([
            'title' => 'Definitions' ,
            'title_ar' => 'التعاريف' ,
            'body' => '• Institution: Institution (write the name of the institution).
• Arhaboa platform: An electronic platform that aims to serve event owners (such as: wedding, engagement, graduation, etc.) to overcome the difficulties that they may encounter during the process of managing and directing invitations to the invitees.
• User: Any person who uses the Arhaboo platform as a visitor, as an event host, as an additional invitee, as an invitee, as a gatekeeper, or
  As a card designer.' ,
            'body_ar' => '• المؤسسة: مؤسسة (نكتب اسم المؤسسة ) .
• منصة  آرحبوا: منصة إلكترونية تهدف إلى خدمة أصحاب المناسبات (مثل: حفل الزفاف، الخطبة، التخرج، إلخ) للتغلب على الصعوبات التي من الممكن أن تواجههم خلال عملية إدارة وتوجيه الدعوات إلى المدعوين.
• المستخدم: أي شخص يقوم باستخدام منصة  آرحبوا كزائر أو كصاحب مناسبة أو كداعي إضافي أو كمدعو أو كحارس بوابة أو
 كمصمم بطاقات.' ,
            'is_agree' => '1' ,
        ]);

        Term::create([
            'title' => 'Introduction' ,
            'title_ar' => 'المقدمة' ,
            'body' => 'We welcome you, and thank you for using the Arhaboo platform, with its products, services, and features.

The following controls and conditions represent an official agreement (contract) between the organization and the users of the Arhaboo platform. Your use of the Welcome platform also constitutes your acceptance of this contract and its provisions without restriction or condition. Accordingly, you must not use it if you do not agree to the terms and conditions contained in this contract.

The organization reserves the right to amend or change these terms and conditions from time to time without prior notice, in order to provide better service and higher quality. It is your responsibility as a user of the Arhaboo platform to review the terms and conditions of use periodically to know the updates that occur to them, and your continued use constitutes your full agreement to all Changes are made, we hope you review our Privacy Policy to learn more about how the organization uses the information provided by users. Note that any violation of this contract by the user may subject his account to suspension without prior notice and without any refundable amounts in some cases.' ,
            'body_ar' => 'نرحب بك، ونشكرك على استخدام منصة  آرحبوا بما تتضمنه من منتجات وخدمات ومميزات.

إن الضوابط والشروط التالية تمثل اتفاق رسمي (عقد) بين المؤسسة ومستخدمي منصة  آرحبوا. كما يشكل استخدامك لمنصة  آرحبوا موافقة منك على هذا العقد وأحكامه دون قيد أو شرط، وتبعاً لذلك يجب عليك عدم استخدامها في حال لم تكن موافقاً على الأحكام والشروط الواردة في هذا العقد.

تحتفظ المؤسسة بحق تعديل أو تغيير هذه الأحكام والشروط من حين لآخر دون إشعار مسبق، وذلك من أجل خدمة أفضل وجودة أعلى، ويكون من مسؤوليتك كمستخدم لمنصة  آرحبوا مراجعة شروط وأحكام الاستخدام بشكل دوري لمعرفة التحديثات التي تطرأ عليها، كما يشكل استخدامك المستمر موافقتك التامة على كل التغييرات التي يتم إجراؤها، ونأمل مراجعة سياسة الخصوصية لدينا لمعرفة المزيد حول كيفية استخدام المؤسسة للمعلومات التي تقدم من قبل المستخدمين. علماً بأن أي مخالفة لهذا العقد من قبل المستخدم قد تعرض حسابه للإيقاف دون إشعار مسبق وبلا أي مبالغ مسترجعة في بعض الحالات.
' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => 'Language of terms' ,
            'title_ar' => 'لغة الشروط' ,
            'body' => '• Where we provide you with a translation of the Arabic version of the Terms, you agree that the translation may be provided for your convenience only and that the Arabic version of the Terms is the version that will depend on and govern your relationship with the Corporation.
• In the event of any contradiction between what is contained in the Arabic version of the terms and what is contained in the translation, what is contained in the Arabic version will be the reliable reference.' ,
            'body_ar' => '• حيثما نوفر لك ترجمة للنسخة العربية من الشروط، فإنك توافق على أن الترجمة قد يتم توفيرها للتسهيل عليك فقط وأن النسخة العربية للشروط هي النسخة التي سوف تعتمد وتحكم علاقتك بـالمؤسسة.
• في حالة وجود أي تناقض بين ما هو وارد في النسخة العربية من الشروط وما هو وارد في الترجمة، سيكون ما هو وارد في النسخة العربية المرجع الذي يعتد به.
' ,
            'is_agree' => '1' ,
        ]);

        Term::create([
            'title' => 'Modifications' ,
            'title_ar' => 'التعديلات' ,
            'body' => 'The Foundation has the right to update the Arhaboa platform from time to time, and it may also change any of its contents at its sole discretion, or change, suspend or discontinue any service (including, but not limited to, providing any feature, database or content) in any At any time, by posting a notification on the platform or by sending a notification to you via mobile phone or email. The Organization may also impose limits on certain features and services or limit your access to parts or all of the Arhaboo Platform without notice or liability. It should also be taken into account that the content of the Arhaboo platform may not be up to date at all times. The Foundation also does not guarantee that the Arhaboo platform or any of its contents are free of any error or incorrect information.
​' ,
            'body_ar' => 'يحق للمؤسسة تحديث منصة  آرحبوا من وقت لآخر، كما يجوز لها تغيير أي من محتوياتها من وفق تقديرها الخاص، أو تغيير أي خدمة أو تعليقها أو إيقافها (بما في ذلك على سبيل المثال لا الحصر، توفير أي ميزة أو قاعدة بيانات أو محتوى) في أي وقت، وذلك بنشر إخطار على المنصة أو بإرسال إخطار لك عبر الجوال أو البريد الإلكتروني. كما يجوز للمؤسسة أن تضع قيودًا على ميزات وخدمات مُعيَّنة أو تحد من وصولك إلى أجزاء من منصة  آرحبوا أو بأكملها دون إخطار أو مسؤولية. كذلك يجب مراعاة أن محتوى منصة  آرحبوا قد لا يكون محدثا في جميع الأوقات. كما لا تضمن المؤسسة خلو منصة  آرحبوا أو أي من محتوياتها من أي خطأ أو معلومات غير صحيحة.' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => 'Users who are eligible to use the Arhaboo platform' ,
            'title_ar' => 'المستخدمون المؤهلون لاستخدام منصة ارحبو' ,
            'body' => '• Permissible age:
You must be at least 13 years old to use the Arhaboo platform.

• Obtain permission from a parent or legal guardian:
If you are under 18 years of age, you must obtain permission from a parent or legal guardian to use the Arhaboo platform. Please ask them to read this contract with you. If you are a parent or legal guardian of a user under the age of 18, by allowing your child to use the Arhabooa Platform, you are bound by the provisions of this contract and responsible for his or her use of the Arhabooa Platform.

• Commercial activities:
If you are using the Arhaboa platform on behalf of a company, institution, government entity, or private, for-profit or non-profit facility, you pledge to us that you have the authority to act on behalf of this entity and confirm to us that this entity agrees to this contract.' ,
            'body_ar' => '
• السن المسموح به:
يجب أن تبلغ من العمر 13 عامًا على الأقل لتتمكن من استخدام منصة  آرحبوا.

• الحصول على إذن من أحد الوالدَين أو الوصي القانوني:
إذا كان عمرك أقل من 18 عامًا، يجب الحصول على إذن من أحد الوالدَين أو الوصي القانوني لاستخدام منصة  آرحبوا. يرجى مطالبتهم بقراءة هذا العقد معك. إذا كنت أحد الوالدين أو الوصي القانوني لمستخدم يقل عمره عن 18 عامًا، فبالسماح لطفلك باستخدام منصة  آرحبوا، فإنك ملتزم بأحكام هذا العقد ومسؤول عن استخدامه لمنصة  آرحبوا.

• الأنشطة التجارية:
إذا كنت تستخدم منصة  آرحبوا نيابةً عن شركة أو مؤسسة أو جهة حكومية أو منشأة خاصة ربحية أو غير ربحية، فإنك تتعهد لنا أن لديك الصلاحية للتصرف نيابةً عن هذا الكيان وتؤكد لنا موافقة هذا الكيان على هذا العقد.
' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => 'Entitlement to services' ,
            'title_ar' => 'أحقية الحصول على الخدمات' ,
            'body' => 'To obtain the Services, Products and Features, you represent and warrant that:
• Your use of the Arhaboo platform has never been disabled or prevented from using it at any time.
• You are not a competitor to the Arhaboo platform, nor do you offer any product competing with the services, products, and features provided by the organization.
• That you have full legal capacity to contract and that you will not be in violation of any law or contract.' ,
            'body_ar' => 'للحصول على الخدمات والمنتجات والمميزات، أنت تقر وتضمن التالي:
• أنه لم يسبق أن تم تعطيل استخدامك لمنصة  آرحبوا أو منعك من استخدامها في أي وقت من الأوقات.
• أنك لست منافساً لمنصة  آرحبوا، كما أنك لا تقدم أي منتج منافس للخدمات والمنتجات والمميزات المقدمة من قبل المؤسسة.
• أنك تتمتع بكامل الأهلية الشرعية للتعاقد وأنك بذلك لن تكون منتهكاً لأي قانون أو عقد.
' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => 'Pledges and guarantees' ,
            'title_ar' => 'التعهدات والضمانات' ,
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
• The organization has the right to refuse to provide use of the Arhaboa platform without giving any reasons.' ,
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
' ,
            'is_agree' => '1' ,
        ]);

        PrivacyPolicy::create([
            'title' => 'Definitions :',
            'title_ar' => 'التعاريف :',
            'body' => 'We write all the details, including the name, license number, and expiration date
• Arhaboa platform: An electronic platform that aims to provide an integrated solution that serves event owners (such as: wedding, engagement, graduation, reception, family meeting, etc.) to overcome the difficulties that they may encounter during the process of designing, managing, and sending invitations to the invitees.
• User: Any person who uses the Arhaboo platform as a visitor, as an event host, as an additional invitee, as an invitee, or as a portal supervisor.',
            'body_ar' => 'نكتب كل التفاصيل من اسم  ورقم الترخيص وتاريخ الانتهاء
• منصة آرحبوا:منصة إلكترونية تهدف إلى تقديم حل متكامل يخدم أصحاب المناسبات (مثل: حفل الزفاف والخطبة والتخرج والاستقبال واجتماع عائلي وإلخ) للتغلب على الصعوبات التي من الممكن أن تواجههم خلال عملية تصميم وإدارة وإرسال الدعوات إلى المدعوين.
• المستخدم: أي شخص يقوم باستخدام منصة آرحبوا كزائر أو كصاحب مناسبة أو كداعي إضافي أو كمدعو أو مشرفـ/ـة بوابة',
        ]);

        PrivacyPolicy::create([
            'title' => 'Introduction',
            'title_ar' => 'المقدمة',
            'body' => 'When you use the Arhaboa platform, you trust us with your data and information, and this is a great responsibility, so we work hard and with great care to protect your data and information and give you control over them. This privacy policy governs the manner in which the organization collects, uses, saves and declares data and information collected by users of the Arhaboo platform. This privacy policy applies to the Arhaboo platform and all products, services and features provided through it.',
            'body_ar' => 'عند استخدام منصة آرحبوا، فإنك تأتمننا على بياناتك ومعلوماتك وهذه مسؤولية كبيرة، لذلك نعمل بجد وحرص شديد لحماية بياناتك ومعلوماتك ونمنحك التحكم فيها. سياسة الخصوصية هذه تحكم الأسلوب الذي تقوم به المؤسسة بجمع واستخدام وحفظ وتصريح البيانات والمعلومات التي تم جمعها من قبل مستخدمين منصة آرحبوا، وتُطبق سياسة الخصوصية هذه في منصة آرحبوا وكافة المنتجات والخدمات والمميزات المُقدمة من خلالها.
',
        ]);

        PrivacyPolicy::create([
            'title' => 'personal information',
            'title_ar' => 'المعلومات الشخصية',
            'body' => 'The organization collects some personal information for users in various ways, including but not limited to: the times the user visits the Arhboa platform, registers on the Arhboa platform, fills out the application, fills out the questionnaire, and other activities, services, features or resources that we may provide on the Arhboo platform. Users may also be asked to provide their full name, email address, phone number and address information, information about contacts (invitees), the geographical location of the event and part of credit card data. All this data is provided voluntarily by the user, and this information is collected exclusively to perform the functions provided through the Arhaboo platform. Also to provide users with all other offers and services that we may think will interest them',
            'body_ar' => 'تقوم المؤسسة بجمع بعض المعلومات الشخصية للمستخدمين بطرق مختلفة، وتشمل ولا تقتصر فقط على: أوقات زيارة المستخدم لمنصة آرحبوا، والتسجيل في منصة آرحبوا، وملء الطلب، ونموذج تعبئة الاستبانة، وغير ذلك من الأنشطة والخدمات والمميزات أو المصادر التي قد نوفرها على منصة آرحبوا. كما أنه قد يُطلب من المستخدمين توضيح الاسم بشكل كامل وعنوان البريد الإلكتروني ورقم الهاتف ومعلومات العنوان، ومعلومات عن جهات الاتصال (المدعوين)، والموقع الجغرافي للمناسبة وجزء من بيانات بطاقة الائتمان. ويكون تقديم كل هذه البيانات طواعية من قبل المستخدم، ويتم جمع تلك المعلومات بشكل حصري لأداء الوظائف المقدمة عبر منصة آرحبوا. وأيضًا لتزويد المستخدمين بكافة العروض والخدمات الأخرى التي قد نعتقد أنها تثير اهتمامهم',
        ]);


        PrivacyPolicy::create([
            'title' => 'payment information',
            'title_ar' => 'معلومات الدفع',
            'body' => 'When you request a service from the Arhaboa platform, you are required to choose the payment method, and that the organization guarantees that your data is protected and that it takes extreme care and complete confidentiality to maintain electronic and practical protection measures. The institution also does not save credit card information or other sensitive financial information that is used on the Arhaboa platform, other than the financial data related to purchases via bank transfers, which it processes directly. As credit card information reaches the financial intermediary directly (we write the name of the broker here to preserve the customer’s privacy and protect him from fraudulent operations, and you can visit the website of the payment gateway (we write the name of the broker here) to view the terms of their privacy policy.',
            'body_ar' => 'عندما تقوم بطلب خدمة من منصة آرحبوا، فإنك مطالب باختيار طريقة الدفع، وأن المؤسسة تضمن لك حماية بياناتك واتخاذ الحرص الشديد والسرية التامة للحفاظ على إجراءات الحماية الإلكترونية والعملية. كما لا تقوم المؤسسة بحفظ معلومات بطاقات الائتمان أو غيرها من المعلومات المالية الحساسة التي يتم استخدامها على منصة آرحبوا، بخلاف البيانات المالية الخاصة بالشراء عن طريق الحوالات المصرفية والتي تقوم بمعالجتها بشكل مباشر. حيث أن معلومات بطاقات الائتمان تصل مباشرة للوسيط المالي ()نكتب اسم الوسيط هنا  حفاظا على خصوصية العميل وحمايةً له من عمليات الاحتيال، ويمكنك زيارة الموقع الإلكتروني الخاص ببوابة الدفع ()نكتب اسم الوسيط هنا  للاطلاع على بنود سياسة الخصوصية الخاصة بهم',
        ]);


        PrivacyPolicy::create([
            'title' => 'other information',
            'title_ar' => 'معلومات أخرى',
            'body' => 'The organization collects some information about users wherever they interact with the Arhaboo platform, and this information does not relate to the user personally, but may include technical information about the user’s methods of connecting to the service, such as the company used to provide the Internet service and other similar information.',
            'body_ar' => 'تقوم المؤسسة بجمع بعض المعلومات عن المستخدمين أينما تفاعلوا مع منصة آرحبوا، وهذه المعلومات لا تتعلق بالمستخدم بشكل شخصي، إنما قد تتضمن معلومات تقنية عن أساليب اتصال المستخدم بالخدمة، مثل الشركة المستخدمة لتقديم خدمة الإنترنت وغيرها من المعلومات المشابهة.',
        ]);


        PrivacyPolicy::create([
            'title' => 'Marketing',
            'title_ar' => 'التسويق',
            'body' => 'The organization guarantees the user not to sell, rent, or give his personal information to others to serve the marketing purposes of a third party.',
            'body_ar' => 'تضمن المؤسسة للمستخدم عدم بيع أو تأجير أو إعطاء معلوماته الشخصية إلى الغير لخدمة الأغراض التسويقية لطرف ثالث.',
        ]);

    }
}
