<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
