<?php

namespace Database\Seeders;

use App\Models\Nursery;
use Illuminate\Database\Seeder;

class NurserySeeder extends Seeder
{
    public function run(): void
    {
        $img = fn (string $id) => "https://images.unsplash.com/photo-{$id}?auto=format&fit=crop&w=900&q=60";

        $nurseries = [
            [
                'name_en' => 'Little Stars Nursery', 'name_ar' => 'حضانة النجوم الصغيرة',
                'city' => 'Gaza', 'district' => 'Al-Rimal',
                'description_en' => 'A bright, bilingual early-learning space focused on play-based development and emotional safety.',
                'description_ar' => 'مساحة تعلّم مبكّر مضيئة وثنائية اللغة تركّز على التعلّم باللعب والأمان العاطفي للطفل.',
                'age_min' => 6, 'age_max' => 48, 'capacity' => 80, 'rating' => 4.8,
                'phone' => '+970 59 123 4567', 'email' => 'hello@littlestars.ps',
                'image_url' => $img('1503454537195-1dcabb73ffb9'),
                'is_verified' => true, 'has_meals' => true, 'has_transport' => true, 'is_bilingual' => true,
            ],
            [
                'name_en' => 'Sunrise Kids Academy', 'name_ar' => 'أكاديمية شروق الأطفال',
                'city' => 'Gaza', 'district' => 'Tal al-Hawa',
                'description_en' => 'Structured curriculum with art, music and motor-skills rooms for toddlers and preschoolers.',
                'description_ar' => 'منهج منظّم يشمل غرفًا للفن والموسيقى والمهارات الحركية للأطفال الصغار وما قبل المدرسة.',
                'age_min' => 12, 'age_max' => 60, 'capacity' => 120, 'rating' => 4.6,
                'phone' => '+970 59 234 5678', 'email' => 'info@sunrisekids.ps',
                'image_url' => $img('1587654780291-39c9404d746b'),
                'is_verified' => true, 'has_meals' => true, 'has_transport' => false, 'is_bilingual' => true,
            ],
            [
                'name_en' => 'Rainbow Garden', 'name_ar' => 'حديقة قوس قزح',
                'city' => 'Khan Younis', 'district' => 'Al-Amal',
                'description_en' => 'Nature-led nursery with an outdoor garden, sensory play and a warm caregiver ratio.',
                'description_ar' => 'حضانة قائمة على الطبيعة مع حديقة خارجية ولعب حسّي ونسبة رعاية مريحة لكل طفل.',
                'age_min' => 18, 'age_max' => 72, 'capacity' => 60, 'rating' => 4.7,
                'phone' => '+970 59 345 6789', 'email' => 'care@rainbowgarden.ps',
                'image_url' => $img('1526634332515-d56c5fd16991'),
                'is_verified' => true, 'has_meals' => false, 'has_transport' => true, 'is_bilingual' => false,
            ],
            [
                'name_en' => 'Happy Hands Daycare', 'name_ar' => 'حضانة الأيادي السعيدة',
                'city' => 'Rafah', 'district' => 'Al-Shaboura',
                'description_en' => 'Affordable, community-rooted daycare with a strong focus on Arabic literacy and storytelling.',
                'description_ar' => 'حضانة مجتمعية بأسعار مناسبة تركّز على القراءة العربية المبكّرة ورواية القصص.',
                'age_min' => 12, 'age_max' => 60, 'capacity' => 50, 'rating' => 4.3,
                'phone' => '+970 59 456 7890', 'email' => 'hello@happyhands.ps',
                'image_url' => $img('1544487660-b86394cfd6e8'),
                'is_verified' => false, 'has_meals' => true, 'has_transport' => false, 'is_bilingual' => false,
            ],
            [
                'name_en' => 'Bright Future Montessori', 'name_ar' => 'مونتيسوري المستقبل المشرق',
                'city' => 'Gaza', 'district' => 'Sheikh Radwan',
                'description_en' => 'Montessori-inspired environment that nurtures independence and curiosity from an early age.',
                'description_ar' => 'بيئة مستوحاة من منهج مونتيسوري تنمّي الاستقلالية وحبّ الاستطلاع منذ سنّ مبكّرة.',
                'age_min' => 24, 'age_max' => 72, 'capacity' => 70, 'rating' => 4.9,
                'phone' => '+970 59 567 8901', 'email' => 'admin@brightfuture.ps',
                'image_url' => $img('1599566150163-29194dcaad36'),
                'is_verified' => true, 'has_meals' => true, 'has_transport' => true, 'is_bilingual' => true,
            ],
            [
                'name_en' => 'Tiny Steps Nursery', 'name_ar' => 'حضانة الخطوات الصغيرة',
                'city' => 'Deir al-Balah', 'district' => 'Center',
                'description_en' => 'A gentle first-step nursery for infants and young toddlers with experienced caregivers.',
                'description_ar' => 'حضانة لطيفة للخطوة الأولى للرُّضّع والأطفال الصغار مع مربيّات ذوات خبرة.',
                'age_min' => 4, 'age_max' => 36, 'capacity' => 40, 'rating' => 4.5,
                'phone' => '+970 59 678 9012', 'email' => 'contact@tinysteps.ps',
                'image_url' => $img('1576765608535-5f04d1e3f289'),
                'is_verified' => false, 'has_meals' => false, 'has_transport' => false, 'is_bilingual' => true,
            ],
        ];

        foreach ($nurseries as $data) {
            Nursery::query()->updateOrCreate(
                ['name_en' => $data['name_en']],
                $data
            );
        }
    }
}
