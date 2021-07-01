<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Testimonial::create([
            'testimonial' => 'نحن عيادة أسنان تركز على الأسرة ، تأسست في عام 1997 مع التركيز القوي على الرعاية الوقائية وطب الأسنان العام لمساعدتك أنت وعائلتك على تحقيق ابتسامة صحية والحفاظ عليها مدى الحياة. أثناء استشارتك ، نود أن نأخذ الوقت الكافي لمناقشة جميع الخيارات المتاحة معك لحل مشاكل الأسنان الخاصة بك حتى نتمكن من توفير العلاج الأنسب لك. نحن ملتزمون بحضور دورات وندوات التعليم المستمر التي تغطي جميع مجالات طب الأسنان من أجل ضمان حصول جميع المرضى على أفضل وأحدث العلاجات المتاحة.❤',
        ]);
    }
}
