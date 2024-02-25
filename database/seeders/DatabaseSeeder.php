<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AboutApp;
use App\Models\ContactUs;
use App\Models\FrequentlyAskedQuestion;
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
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);

        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);


        Term::create([
            'title' => '' ,
            'title_ar' => '' ,
            'body' => '' ,
            'body_ar' => '' ,
            'is_agree' => '1' ,
        ]);

    }
}
