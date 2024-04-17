<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Seeder;

class FrequentlyAskedQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
