<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name' => 'Bronze package services :',
            'name_ar' => 'خدمات الباقة  البرونزية :',
            'description' => 'A ready -to -call design is chosen from the application designs.
Send invitations from the application.
Confirm attendance or apology to the invitees.
Call for apology and disruption
(10%of the total invitations).
Knowledge of acceptance and apology for the name.
A special entry code for every invitee.
The feature of scanning entry codes from the application.
Send a reminder before the occasion.',
            'description_ar' => '.تصميم جاهز للدعوة يتم الأختيار من التصاميم الموجودة بالتطبيق .
إرسال الدعوات من التطبيق.
تأكيد الحضور أو الإعتذار للمدعوين.
دعوات تعويضية عن الإعتذار و التعطيل
(%10 من إجمالي الدعوات).
معرفة القبول و الإعتذار بالأسم.
كود دخول خاص لكل مدعو.
خاصية مسح أكواد الدخول من التطبيق.
إرسال تذكير قبل المناسبة بــ يوم.',
            'color' => '#91500f',
            'discount' => '10',
        ]);

        Package::create([
            'name' => 'Silver package services:',
            'name_ar' => 'خدمات الباقة الفضية :',
            'description' => 'Ready design for the invitation. Choose from the designs in the application.
Send invitations from the app.
Confirm attendance or apologize to invitees.
Knowing acceptance and apology by name.
A special access code for each invitee.
The feature of scanning access codes from the application.
Send a reminder one day before the event.
Compensatory calls for apology and disruption
(25% of total invitations).
Follow up on the invitees on the waiting list
(WhatsApp).',
            'description_ar' => 'تصميم جاهز للدعوة الأختيار  من التصاميم الموجودة بالتطبيق .
إرسال الدعوات من التطبيق.
تأكيد الحضور أو الإعتذار للمدعوين.
معرفة القبول و الإعتذار بالأسم.
كود دخول خاص لكل مدعو.
خاصية مسح أكواد الدخول من التطبيق.
إرسال تذكير قبل المناسبة بــ يوم.
دعوات تعويضية عن الإعتذار و التعطيل
(%25 من إجمالي الدعوات).
متابعة المدعوين على قائمة الإنتظار
(واتس اب).',
            'color' => '#616060',
            'discount' => '25',
        ]);

        Package::create([
            'name' => 'Gold Card Services:',
            'name_ar' => 'خدمات البطاقة الذهبية :',
            'description' => 'Design the invitation according to the theme of the occasion
Or customer request (picture).
Send invitations from the app or the Welcome Team.
Confirm attendance or apologize to invitees.
Knowing the acceptance or apology by name.
A special access code for each invitee.
The feature of scanning access codes from the application.
Send a reminder one day before the event.
Compensatory calls for apology and disruption
(50% of total invitations).
Follow the invitees on the waiting list
(WhatsApp and phone).
Responding to invitees’ inquiries.
Review the file of names of invitees before sending.',
            'description_ar' => 'تصميم الدعوة حسب ثيم المناسبة
أو طلب العميل (صورة).
إرسال الدعوات من التطبيق أو فريق  آرحبوا.
تأكيد الحضور أو الإعتذار للمدعوين.
معرفة القبول أو الإعتذار بالاسم.
كود دخول خاص لكل مدعو.
خاصية مسح أكواد الدخول من التطبيق.
إرسال تذكير قبل المناسبة بــ يوم.
دعوات تعويضية عن الإعتذار و التعطيل
(50% من إجمالي الدعوات).
متابعة المدعوين على قائمة  الانتظار
(واتس اب و هاتفي).
الرد على استفسارات المدعوين.
مراجعة ملف أسماء المدعوين قبل الأرسال.',
            'color' => '#b39704',
            'discount' => '50',
        ]);

        //        Package::create([
        //            'name' => 'Diamond package services:',
        //            'name_ar' => 'خدمات الباقة الماسية :',
        //            'description' => 'Design the invitation according to the theme of the occasion
        //Or customer request (picture).
        //3 additional designs (themes for dinner card, table card, and water card.).
        //Send invitations from the app or the Welcome Team.
        //Confirm attendance or apologize to invitees.
        //Knowing the acceptance or apology by name.
        //A special access code for each invitee.
        //The feature of scanning access codes from the application.
        //Send a reminder one day before the event.
        //Compensatory calls for apology and disruption
        //(100% of total invitations).
        //Follow up on the invitees on the waiting list
        //(WhatsApp and phone).
        //Responding to invitees’ inquiries.
        //Review the file of invitees’ names before sending.
        //Prepare a file of the names of the invitees.',
        //            'description_ar' => 'تصميم الدعوة حسب ثيم المناسبة
        //أو طلب العميل (صورة ).
        //3 تصاميم إضافية (ثيمات لـ كرت العشاء وكرت الطاولة وكرت الماء.).
        //إرسال الدعوات من التطبيق أو فريق  آرحبوا.
        //تأكيد الحضور أو الإعتذار للمدعوين.
        //معرفة القبول أو الإعتذار بالأسم.
        //كود دخول خاص لكل مدعو.
        //خاصية مسح أكواد الدخول من التطبيق.
        //إرسال تذكير قبل المناسبة بــ يوم.
        //دعوات تعويضية عن الإعتذار و التعطيل
        //(100% من إجمالي الدعوات).
        //متابعة المدعوين على قائمة الأنتظار
        //(واتس اب و هاتفي).
        //الرد على استفسارات المدعوين.
        //مراجعة ملف أسماء المدعوين قبل الارسال.
        //إعداد ملف أسماء المدعوين.',
        //            'color' => '#B9F2FF',
        //        ]);
        //
    }
}
