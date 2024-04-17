<?php

namespace Database\Seeders;

use App\Models\AboutApp;
use Illuminate\Database\Seeder;

class AboutAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
