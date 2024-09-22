<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB; 

class TemplateJawadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $templateData = [
[
        "image" => "/Invitations/Baby/Baby Shower/5100001.webp",
        "template_code" => "5100001.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100002.webp",
        "template_code" => "5100002.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100003.webp",
        "template_code" => "5100003.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100004.webp",
        "template_code" => "5100004.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100005.webp",
        "template_code" => "5100005.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100006.webp",
        "template_code" => "5100006.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100007.webp",
        "template_code" => "5100007.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100008.webp",
        "template_code" => "5100008.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100009.webp",
        "template_code" => "5100009.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100010.webp",
        "template_code" => "5100010.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100011.webp",
        "template_code" => "5100011.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100012.webp",
        "template_code" => "5100012.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100013.webp",
        "template_code" => "5100013.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100014.webp",
        "template_code" => "5100014.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100015.webp",
        "template_code" => "5100015.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100016.webp",
        "template_code" => "5100016.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100017.webp",
        "template_code" => "5100017.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100018.webp",
        "template_code" => "5100018.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100019.webp",
        "template_code" => "5100019.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/Baby Shower/5100020.webp",
        "template_code" => "5100020.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200001.webp",
        "template_code" => "5200001.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200002.webp",
        "template_code" => "5200002.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200003.webp",
        "template_code" => "5200003.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200004.webp",
        "template_code" => "5200004.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200005.webp",
        "template_code" => "5200005.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200006.webp",
        "template_code" => "5200006.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200007.webp",
        "template_code" => "5200007.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200008.webp",
        "template_code" => "5200008.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200009.webp",
        "template_code" => "5200009.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200010.webp",
        "template_code" => "5200010.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200011.webp",
        "template_code" => "5200011.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200012.webp",
        "template_code" => "5200012.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200013.webp",
        "template_code" => "5200013.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200014.webp",
        "template_code" => "5200014.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200015.webp",
        "template_code" => "5200015.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200016.webp",
        "template_code" => "5200016.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200017.webp",
        "template_code" => "5200017.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200018.webp",
        "template_code" => "5200018.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200019.webp",
        "template_code" => "5200019.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Baby/New Baby/5200020.webp",
        "template_code" => "5200020.",
        "category_id" => $categories->where("name" ,"=" ,"Baby")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100001.webp",
        "template_code" => "3100001.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100002.webp",
        "template_code" => "3100002.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100003.webp",
        "template_code" => "3100003.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100004.webp",
        "template_code" => "3100004.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100005.webp",
        "template_code" => "3100005.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100006.webp",
        "template_code" => "3100006.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100007.webp",
        "template_code" => "3100007.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100008.webp",
        "template_code" => "3100008.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100009.webp",
        "template_code" => "3100009.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100010.webp",
        "template_code" => "3100010.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100011.webp",
        "template_code" => "3100011.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100012.webp",
        "template_code" => "3100012.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100013.webp",
        "template_code" => "3100013.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100014.webp",
        "template_code" => "3100014.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100015.webp",
        "template_code" => "3100015.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100016.webp",
        "template_code" => "3100016.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100017.webp",
        "template_code" => "3100017.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100018.webp",
        "template_code" => "3100018.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100019.webp",
        "template_code" => "3100019.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100020.webp",
        "template_code" => "3100020.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100021.webp",
        "template_code" => "3100021.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100022.webp",
        "template_code" => "3100022.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100023.webp",
        "template_code" => "3100023.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100024.webp",
        "template_code" => "3100024.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100025.webp",
        "template_code" => "3100025.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100026.webp",
        "template_code" => "3100026.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100027.webp",
        "template_code" => "3100027.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100028.webp",
        "template_code" => "3100028.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100029.webp",
        "template_code" => "3100029.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100030.webp",
        "template_code" => "3100030.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100031.webp",
        "template_code" => "3100031.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100032.webp",
        "template_code" => "3100032.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100033.webp",
        "template_code" => "3100033.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100034.webp",
        "template_code" => "3100034.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100035.webp",
        "template_code" => "3100035.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100036.webp",
        "template_code" => "3100036.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100037.webp",
        "template_code" => "3100037.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100038.webp",
        "template_code" => "3100038.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100039.webp",
        "template_code" => "3100039.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100040.webp",
        "template_code" => "3100040.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100041.webp",
        "template_code" => "3100041.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100042.webp",
        "template_code" => "3100042.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100043.webp",
        "template_code" => "3100043.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100044.webp",
        "template_code" => "3100044.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100045.webp",
        "template_code" => "3100045.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100046.webp",
        "template_code" => "3100046.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100047.webp",
        "template_code" => "3100047.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100048.webp",
        "template_code" => "3100048.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100049.webp",
        "template_code" => "3100049.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100050.webp",
        "template_code" => "3100050.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100051.webp",
        "template_code" => "3100051.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100052.webp",
        "template_code" => "3100052.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100053.webp",
        "template_code" => "3100053.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100054.webp",
        "template_code" => "3100054.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100055.webp",
        "template_code" => "3100055.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100056.webp",
        "template_code" => "3100056.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100057.webp",
        "template_code" => "3100057.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100058.webp",
        "template_code" => "3100058.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100059.webp",
        "template_code" => "3100059.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100060.webp",
        "template_code" => "3100060.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100061.webp",
        "template_code" => "3100061.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100062.webp",
        "template_code" => "3100062.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100063.webp",
        "template_code" => "3100063.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100064.webp",
        "template_code" => "3100064.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100065.webp",
        "template_code" => "3100065.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100066.webp",
        "template_code" => "3100066.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100067.webp",
        "template_code" => "3100067.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100068.webp",
        "template_code" => "3100068.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100069.webp",
        "template_code" => "3100069.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100070.webp",
        "template_code" => "3100070.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100071.webp",
        "template_code" => "3100071.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100072.webp",
        "template_code" => "3100072.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100073.webp",
        "template_code" => "3100073.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100074.webp",
        "template_code" => "3100074.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100075.webp",
        "template_code" => "3100075.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100076.webp",
        "template_code" => "3100076.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100077.webp",
        "template_code" => "3100077.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100078.webp",
        "template_code" => "3100078.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100079.webp",
        "template_code" => "3100079.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100080.webp",
        "template_code" => "3100080.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100081.webp",
        "template_code" => "3100081.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100082.webp",
        "template_code" => "3100082.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100083.webp",
        "template_code" => "3100083.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100084.webp",
        "template_code" => "3100084.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100085.webp",
        "template_code" => "3100085.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100086.webp",
        "template_code" => "3100086.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100087.webp",
        "template_code" => "3100087.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100088.webp",
        "template_code" => "3100088.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100089.webp",
        "template_code" => "3100089.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100090.webp",
        "template_code" => "3100090.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100091.webp",
        "template_code" => "3100091.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100092.webp",
        "template_code" => "3100092.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100093.webp",
        "template_code" => "3100093.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100094.webp",
        "template_code" => "3100094.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100095.webp",
        "template_code" => "3100095.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100096.webp",
        "template_code" => "3100096.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100097.webp",
        "template_code" => "3100097.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100098.webp",
        "template_code" => "3100098.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100099.webp",
        "template_code" => "3100099.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100100.webp",
        "template_code" => "3100100.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100101.webp",
        "template_code" => "3100101.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100102.webp",
        "template_code" => "3100102.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100103.webp",
        "template_code" => "3100103.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100104.webp",
        "template_code" => "3100104.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100105.webp",
        "template_code" => "3100105.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100106.webp",
        "template_code" => "3100106.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100107.webp",
        "template_code" => "3100107.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100108.webp",
        "template_code" => "3100108.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Boys/3100109.webp",
        "template_code" => "3100109.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200001.webp",
        "template_code" => "3200001.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200002.webp",
        "template_code" => "3200002.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200003.webp",
        "template_code" => "3200003.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200004.webp",
        "template_code" => "3200004.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200005.webp",
        "template_code" => "3200005.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200006.webp",
        "template_code" => "3200006.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200007.webp",
        "template_code" => "3200007.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200008.webp",
        "template_code" => "3200008.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200009.webp",
        "template_code" => "3200009.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200010.webp",
        "template_code" => "3200010.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200011.webp",
        "template_code" => "3200011.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200012.webp",
        "template_code" => "3200012.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200013.webp",
        "template_code" => "3200013.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200014.webp",
        "template_code" => "3200014.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200015.webp",
        "template_code" => "3200015.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200016.webp",
        "template_code" => "3200016.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200017.webp",
        "template_code" => "3200017.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200018.webp",
        "template_code" => "3200018.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200019.webp",
        "template_code" => "3200019.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200020.webp",
        "template_code" => "3200020.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200021.webp",
        "template_code" => "3200021.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200022.webp",
        "template_code" => "3200022.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200023.webp",
        "template_code" => "3200023.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200024.webp",
        "template_code" => "3200024.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200025.webp",
        "template_code" => "3200025.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200026.webp",
        "template_code" => "3200026.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200027.webp",
        "template_code" => "3200027.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200028.webp",
        "template_code" => "3200028.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200029.webp",
        "template_code" => "3200029.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200030.webp",
        "template_code" => "3200030.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200031.webp",
        "template_code" => "3200031.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200032.webp",
        "template_code" => "3200032.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200033.webp",
        "template_code" => "3200033.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200034.webp",
        "template_code" => "3200034.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200035.webp",
        "template_code" => "3200035.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200036.webp",
        "template_code" => "3200036.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200037.webp",
        "template_code" => "3200037.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200038.webp",
        "template_code" => "3200038.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200039.webp",
        "template_code" => "3200039.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200040.webp",
        "template_code" => "3200040.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200041.webp",
        "template_code" => "3200041.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200042.webp",
        "template_code" => "3200042.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200043.webp",
        "template_code" => "3200043.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200044.webp",
        "template_code" => "3200044.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200045.webp",
        "template_code" => "3200045.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200046.webp",
        "template_code" => "3200046.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200047.webp",
        "template_code" => "3200047.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200048.webp",
        "template_code" => "3200048.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200049.webp",
        "template_code" => "3200049.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200050.webp",
        "template_code" => "3200050.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200051.webp",
        "template_code" => "3200051.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200052.webp",
        "template_code" => "3200052.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200053.webp",
        "template_code" => "3200053.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200054.webp",
        "template_code" => "3200054.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200055.webp",
        "template_code" => "3200055.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200056.webp",
        "template_code" => "3200056.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200057.webp",
        "template_code" => "3200057.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200058.webp",
        "template_code" => "3200058.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200059.webp",
        "template_code" => "3200059.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200060.webp",
        "template_code" => "3200060.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200061.webp",
        "template_code" => "3200061.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200062.webp",
        "template_code" => "3200062.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200063.webp",
        "template_code" => "3200063.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200064.webp",
        "template_code" => "3200064.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200065.webp",
        "template_code" => "3200065.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200066.webp",
        "template_code" => "3200066.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200067.webp",
        "template_code" => "3200067.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200068.webp",
        "template_code" => "3200068.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200069.webp",
        "template_code" => "3200069.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200070.webp",
        "template_code" => "3200070.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200071.webp",
        "template_code" => "3200071.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200072.webp",
        "template_code" => "3200072.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200073.webp",
        "template_code" => "3200073.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200074.webp",
        "template_code" => "3200074.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200075.webp",
        "template_code" => "3200075.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200076.webp",
        "template_code" => "3200076.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200077.webp",
        "template_code" => "3200077.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200078.webp",
        "template_code" => "3200078.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200079.webp",
        "template_code" => "3200079.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200080.webp",
        "template_code" => "3200080.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200081.webp",
        "template_code" => "3200081.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200082.webp",
        "template_code" => "3200082.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200083.webp",
        "template_code" => "3200083.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200084.webp",
        "template_code" => "3200084.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200085.webp",
        "template_code" => "3200085.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200086.webp",
        "template_code" => "3200086.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200087.webp",
        "template_code" => "3200087.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200088.webp",
        "template_code" => "3200088.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200089.webp",
        "template_code" => "3200089.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200090.webp",
        "template_code" => "3200090.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200091.webp",
        "template_code" => "3200091.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200092.webp",
        "template_code" => "3200092.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200093.webp",
        "template_code" => "3200093.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200094.webp",
        "template_code" => "3200094.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200095.webp",
        "template_code" => "3200095.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200096.webp",
        "template_code" => "3200096.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200097.webp",
        "template_code" => "3200097.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200098.webp",
        "template_code" => "3200098.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200099.webp",
        "template_code" => "3200099.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200100.webp",
        "template_code" => "3200100.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200101.webp",
        "template_code" => "3200101.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200102.webp",
        "template_code" => "3200102.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200103.webp",
        "template_code" => "3200103.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200104.webp",
        "template_code" => "3200104.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200105.webp",
        "template_code" => "3200105.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200106.webp",
        "template_code" => "3200106.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200107.webp",
        "template_code" => "3200107.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200108.webp",
        "template_code" => "3200108.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200109.webp",
        "template_code" => "3200109.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200110.webp",
        "template_code" => "3200110.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Girls/3200111.webp",
        "template_code" => "3200111.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300001.webp",
        "template_code" => "3300001.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300002.webp",
        "template_code" => "3300002.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300003.webp",
        "template_code" => "3300003.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300004.webp",
        "template_code" => "3300004.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300005.webp",
        "template_code" => "3300005.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300006.webp",
        "template_code" => "3300006.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300007.webp",
        "template_code" => "3300007.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300008.webp",
        "template_code" => "3300008.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300009.webp",
        "template_code" => "3300009.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300010.webp",
        "template_code" => "3300010.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300011.webp",
        "template_code" => "3300011.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300012.webp",
        "template_code" => "3300012.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300013.webp",
        "template_code" => "3300013.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300014.webp",
        "template_code" => "3300014.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300015.webp",
        "template_code" => "3300015.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300016.webp",
        "template_code" => "3300016.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300017.webp",
        "template_code" => "3300017.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300018.webp",
        "template_code" => "3300018.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300019.webp",
        "template_code" => "3300019.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Men/3300020.webp",
        "template_code" => "3300020.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400001.webp",
        "template_code" => "3400001.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400002.webp",
        "template_code" => "3400002.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400003.webp",
        "template_code" => "3400003.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400004.webp",
        "template_code" => "3400004.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400005.webp",
        "template_code" => "3400005.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400006.webp",
        "template_code" => "3400006.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400007.webp",
        "template_code" => "3400007.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400008.webp",
        "template_code" => "3400008.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400009.webp",
        "template_code" => "3400009.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400010.webp",
        "template_code" => "3400010.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400011.webp",
        "template_code" => "3400011.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400012.webp",
        "template_code" => "3400012.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400013.webp",
        "template_code" => "3400013.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400014.webp",
        "template_code" => "3400014.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400015.webp",
        "template_code" => "3400015.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400016.webp",
        "template_code" => "3400016.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400017.webp",
        "template_code" => "3400017.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400018.webp",
        "template_code" => "3400018.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400019.webp",
        "template_code" => "3400019.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Birthday/Women/3400020.webp",
        "template_code" => "3400020.",
        "category_id" => $categories->where("name" ,"=" ,"Birthday")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000001.webp",
        "template_code" => "6000001.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000002.webp",
        "template_code" => "6000002.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000003.webp",
        "template_code" => "6000003.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000004.webp",
        "template_code" => "6000004.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000005.webp",
        "template_code" => "6000005.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000006.webp",
        "template_code" => "6000006.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000007.webp",
        "template_code" => "6000007.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000008.webp",
        "template_code" => "6000008.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000009.webp",
        "template_code" => "6000009.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000010.webp",
        "template_code" => "6000010.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000011.webp",
        "template_code" => "6000011.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000012.webp",
        "template_code" => "6000012.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000013.webp",
        "template_code" => "6000013.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000014.webp",
        "template_code" => "6000014.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000015.webp",
        "template_code" => "6000015.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000016.webp",
        "template_code" => "6000016.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000017.webp",
        "template_code" => "6000017.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000018.webp",
        "template_code" => "6000018.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000019.webp",
        "template_code" => "6000019.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000020.webp",
        "template_code" => "6000020.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000021.webp",
        "template_code" => "6000021.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000022.webp",
        "template_code" => "6000022.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000023.webp",
        "template_code" => "6000023.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000024.webp",
        "template_code" => "6000024.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000025.png",
        "template_code" => "6000025",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000026.webp",
        "template_code" => "6000026.",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000027.png",
        "template_code" => "6000027",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000028.png",
        "template_code" => "6000028",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000029.png",
        "template_code" => "6000029",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000030.png",
        "template_code" => "6000030",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000031.png",
        "template_code" => "6000031",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000032.png",
        "template_code" => "6000032",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000033.png",
        "template_code" => "6000033",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000034.png",
        "template_code" => "6000034",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000035.png",
        "template_code" => "6000035",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Bridal Shower/6000036.png",
        "template_code" => "6000036",
        "category_id" => $categories->where("name" ,"=" ,"Bridal Shower")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100001.webp",
        "template_code" => "2100001.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100002.webp",
        "template_code" => "2100002.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100003.webp",
        "template_code" => "2100003.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100004.webp",
        "template_code" => "2100004.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100005.webp",
        "template_code" => "2100005.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100006.webp",
        "template_code" => "2100006.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100007.webp",
        "template_code" => "2100007.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100008.webp",
        "template_code" => "2100008.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100009.webp",
        "template_code" => "2100009.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100010.webp",
        "template_code" => "2100010.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100011.webp",
        "template_code" => "2100011.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100012.webp",
        "template_code" => "2100012.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100013.webp",
        "template_code" => "2100013.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100014.webp",
        "template_code" => "2100014.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100015.webp",
        "template_code" => "2100015.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100016.webp",
        "template_code" => "2100016.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100017.webp",
        "template_code" => "2100017.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100018.webp",
        "template_code" => "2100018.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100019.webp",
        "template_code" => "2100019.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100020.webp",
        "template_code" => "2100020.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100021.webp",
        "template_code" => "2100021.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100022.webp",
        "template_code" => "2100022.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100023.webp",
        "template_code" => "2100023.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100024.webp",
        "template_code" => "2100024.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/Goma/2100025.webp",
        "template_code" => "2100025.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200001.webp",
        "template_code" => "2200001.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200002.webp",
        "template_code" => "2200002.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200003.webp",
        "template_code" => "2200003.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200004.webp",
        "template_code" => "2200004.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200005.webp",
        "template_code" => "2200005.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200006.webp",
        "template_code" => "2200006.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200007.webp",
        "template_code" => "2200007.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200008.webp",
        "template_code" => "2200008.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200009.webp",
        "template_code" => "2200009.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200010.webp",
        "template_code" => "2200010.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200011.webp",
        "template_code" => "2200011.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200012.webp",
        "template_code" => "2200012.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200013.webp",
        "template_code" => "2200013.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200014.webp",
        "template_code" => "2200014.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200015.webp",
        "template_code" => "2200015.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200016.webp",
        "template_code" => "2200016.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200017.webp",
        "template_code" => "2200017.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200018.webp",
        "template_code" => "2200018.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200019.webp",
        "template_code" => "2200019.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200020.webp",
        "template_code" => "2200020.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200021.webp",
        "template_code" => "2200021.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200022.webp",
        "template_code" => "2200022.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200023.webp",
        "template_code" => "2200023.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200024.webp",
        "template_code" => "2200024.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200025.webp",
        "template_code" => "2200025.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200026.webp",
        "template_code" => "2200026.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200027.webp",
        "template_code" => "2200027.",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200028.png",
        "template_code" => "2200028",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200029.png",
        "template_code" => "2200029",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200030.png",
        "template_code" => "2200030",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200031.png",
        "template_code" => "2200031",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200032.png",
        "template_code" => "2200032",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200033.png",
        "template_code" => "2200033",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200034.png",
        "template_code" => "2200034",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200035.png",
        "template_code" => "2200035",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Business/L'amour/2200036.png",
        "template_code" => "2200036",
        "category_id" => $categories->where("name" ,"=" ,"Business")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100001.webp",
        "template_code" => "8100001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100002.webp",
        "template_code" => "8100002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100003.webp",
        "template_code" => "8100003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100004.webp",
        "template_code" => "8100004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100005.webp",
        "template_code" => "8100005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100006.webp",
        "template_code" => "8100006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100007.webp",
        "template_code" => "8100007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100008.webp",
        "template_code" => "8100008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100009.webp",
        "template_code" => "8100009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Aqiqah/8100010.webp",
        "template_code" => "8100010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200001.webp",
        "template_code" => "8200001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200002.webp",
        "template_code" => "8200002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200003.webp",
        "template_code" => "8200003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200004.webp",
        "template_code" => "8200004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200005.webp",
        "template_code" => "8200005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200006.webp",
        "template_code" => "8200006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200007.webp",
        "template_code" => "8200007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200008.webp",
        "template_code" => "8200008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200009.webp",
        "template_code" => "8200009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Arrival of a Traveler/8200010.webp",
        "template_code" => "8200010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300001.webp",
        "template_code" => "8300001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300002.webp",
        "template_code" => "8300002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300003.webp",
        "template_code" => "8300003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300004.webp",
        "template_code" => "8300004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300005.webp",
        "template_code" => "8300005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300006.webp",
        "template_code" => "8300006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300007.webp",
        "template_code" => "8300007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300008.webp",
        "template_code" => "8300008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300009.webp",
        "template_code" => "8300009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Award Ceremony/8300010.webp",
        "template_code" => "8300010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400001.webp",
        "template_code" => "8400001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400002.webp",
        "template_code" => "8400002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400003.webp",
        "template_code" => "8400003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400004.webp",
        "template_code" => "8400004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400005.webp",
        "template_code" => "8400005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400006.webp",
        "template_code" => "8400006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400007.webp",
        "template_code" => "8400007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400008.webp",
        "template_code" => "8400008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400009.webp",
        "template_code" => "8400009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400010.webp",
        "template_code" => "8400010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400011.webp",
        "template_code" => "8400011.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400012.webp",
        "template_code" => "8400012.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400013.webp",
        "template_code" => "8400013.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400014.webp",
        "template_code" => "8400014.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400015.webp",
        "template_code" => "8400015.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400016.webp",
        "template_code" => "8400016.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400017.webp",
        "template_code" => "8400017.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400018.webp",
        "template_code" => "8400018.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400019.webp",
        "template_code" => "8400019.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400020.webp",
        "template_code" => "8400020.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400021.webp",
        "template_code" => "8400021.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400022.webp",
        "template_code" => "8400022.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400023.webp",
        "template_code" => "8400023.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400024.webp",
        "template_code" => "8400024.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Bride Reception/8400025.webp",
        "template_code" => "8400025.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500001.webp",
        "template_code" => "8500001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500002.webp",
        "template_code" => "8500002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500003.webp",
        "template_code" => "8500003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500004.webp",
        "template_code" => "8500004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500005.webp",
        "template_code" => "8500005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500006.webp",
        "template_code" => "8500006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500007.webp",
        "template_code" => "8500007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500008.webp",
        "template_code" => "8500008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500009.webp",
        "template_code" => "8500009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Adha/8500010.webp",
        "template_code" => "8500010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600001.png",
        "template_code" => "8600001",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600002.png",
        "template_code" => "8600002",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600003.png",
        "template_code" => "8600003",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600004.png",
        "template_code" => "8600004",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600005.png",
        "template_code" => "8600005",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600006.png",
        "template_code" => "8600006",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600007.png",
        "template_code" => "8600007",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600008.png",
        "template_code" => "8600008",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Eid al-Fitr/8600009.png",
        "template_code" => "8600009",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700001.webp",
        "template_code" => "8700001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700002.webp",
        "template_code" => "8700002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700003.webp",
        "template_code" => "8700003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700004.webp",
        "template_code" => "8700004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700005.webp",
        "template_code" => "8700005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700006.webp",
        "template_code" => "8700006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700007.webp",
        "template_code" => "8700007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700008.webp",
        "template_code" => "8700008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700009.webp",
        "template_code" => "8700009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Evening/8700010.webp",
        "template_code" => "8700010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800001.webp",
        "template_code" => "8800001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800002.webp",
        "template_code" => "8800002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800003.webp",
        "template_code" => "8800003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800004.webp",
        "template_code" => "8800004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800005.webp",
        "template_code" => "8800005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800006.webp",
        "template_code" => "8800006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800007.webp",
        "template_code" => "8800007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800008.webp",
        "template_code" => "8800008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800009.webp",
        "template_code" => "8800009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Family Gathering/8800010.webp",
        "template_code" => "8800010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900001.webp",
        "template_code" => "8900001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900002.webp",
        "template_code" => "8900002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900003.webp",
        "template_code" => "8900003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900004.webp",
        "template_code" => "8900004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900005.webp",
        "template_code" => "8900005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900006.webp",
        "template_code" => "8900006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900007.webp",
        "template_code" => "8900007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900008.webp",
        "template_code" => "8900008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900009.webp",
        "template_code" => "8900009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900010.webp",
        "template_code" => "8900010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900011.webp",
        "template_code" => "8900011.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900012.webp",
        "template_code" => "8900012.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Fashion Show/8900013.webp",
        "template_code" => "8900013.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00001.webp",
        "template_code" => "8A00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00002.webp",
        "template_code" => "8A00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00003.webp",
        "template_code" => "8A00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00004.webp",
        "template_code" => "8A00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00005.webp",
        "template_code" => "8A00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00006.webp",
        "template_code" => "8A00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00007.webp",
        "template_code" => "8A00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00008.webp",
        "template_code" => "8A00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00009.webp",
        "template_code" => "8A00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00010.webp",
        "template_code" => "8A00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Father's Day/8A00011.webp",
        "template_code" => "8A00011.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00001.png",
        "template_code" => "8B00001",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00002.png",
        "template_code" => "8B00002",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00003.png",
        "template_code" => "8B00003",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00004.png",
        "template_code" => "8B00004",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00005.png",
        "template_code" => "8B00005",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gabga/8B00006.png",
        "template_code" => "8B00006",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00001.webp",
        "template_code" => "8C00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00002.webp",
        "template_code" => "8C00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00003.webp",
        "template_code" => "8C00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00004.webp",
        "template_code" => "8C00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00005.webp",
        "template_code" => "8C00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00006.webp",
        "template_code" => "8C00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00007.webp",
        "template_code" => "8C00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00008.webp",
        "template_code" => "8C00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00009.webp",
        "template_code" => "8C00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00010.webp",
        "template_code" => "8C00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00011.webp",
        "template_code" => "8C00011.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Gargee'an/8C00012.webp",
        "template_code" => "8C00012.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00001.png",
        "template_code" => "8D00001",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00002.png",
        "template_code" => "8D00002",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00003.png",
        "template_code" => "8D00003",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00004.png",
        "template_code" => "8D00004",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00005.png",
        "template_code" => "8D00005",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00006.png",
        "template_code" => "8D00006",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Mother's Day/8D00007.png",
        "template_code" => "8D00007",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00001.webp",
        "template_code" => "8E00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00002.webp",
        "template_code" => "8E00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00003.webp",
        "template_code" => "8E00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00004.webp",
        "template_code" => "8E00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00005.webp",
        "template_code" => "8E00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00006.webp",
        "template_code" => "8E00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00007.webp",
        "template_code" => "8E00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00008.webp",
        "template_code" => "8E00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00009.webp",
        "template_code" => "8E00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00010.webp",
        "template_code" => "8E00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00011.webp",
        "template_code" => "8E00011.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00012.webp",
        "template_code" => "8E00012.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Receptions/8E00013.webp",
        "template_code" => "8E00013.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00001.webp",
        "template_code" => "8F00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00002.webp",
        "template_code" => "8F00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00003.webp",
        "template_code" => "8F00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00004.webp",
        "template_code" => "8F00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00005.webp",
        "template_code" => "8F00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00006.webp",
        "template_code" => "8F00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00007.webp",
        "template_code" => "8F00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00008.webp",
        "template_code" => "8F00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00009.webp",
        "template_code" => "8F00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Recovery - Healing/8F00010.webp",
        "template_code" => "8F00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00001.webp",
        "template_code" => "8G00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00002.webp",
        "template_code" => "8G00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00003.webp",
        "template_code" => "8G00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00004.webp",
        "template_code" => "8G00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00005.webp",
        "template_code" => "8G00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00006.webp",
        "template_code" => "8G00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00007.webp",
        "template_code" => "8G00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00008.webp",
        "template_code" => "8G00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00009.webp",
        "template_code" => "8G00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Retirement/8G00010.webp",
        "template_code" => "8G00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00001.webp",
        "template_code" => "8H00001.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00002.webp",
        "template_code" => "8H00002.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00003.webp",
        "template_code" => "8H00003.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00004.webp",
        "template_code" => "8H00004.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00005.webp",
        "template_code" => "8H00005.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00006.webp",
        "template_code" => "8H00006.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00007.webp",
        "template_code" => "8H00007.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00008.webp",
        "template_code" => "8H00008.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00009.webp",
        "template_code" => "8H00009.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Entertainment/Teacher's Day/8H00010.webp",
        "template_code" => "8H00010.",
        "category_id" => $categories->where("name" ,"=" ,"Entertainment")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000001.webp",
        "template_code" => "7000001.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000002.webp",
        "template_code" => "7000002.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000003.webp",
        "template_code" => "7000003.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000004.webp",
        "template_code" => "7000004.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000005.webp",
        "template_code" => "7000005.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000006.webp",
        "template_code" => "7000006.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000007.webp",
        "template_code" => "7000007.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000008.webp",
        "template_code" => "7000008.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000009.webp",
        "template_code" => "7000009.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000010.webp",
        "template_code" => "7000010.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000011.webp",
        "template_code" => "7000011.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000012.webp",
        "template_code" => "7000012.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000013.webp",
        "template_code" => "7000013.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000014.webp",
        "template_code" => "7000014.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000015.webp",
        "template_code" => "7000015.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000016.webp",
        "template_code" => "7000016.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000017.webp",
        "template_code" => "7000017.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000018.webp",
        "template_code" => "7000018.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000019.webp",
        "template_code" => "7000019.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000020.webp",
        "template_code" => "7000020.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000021.webp",
        "template_code" => "7000021.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000022.webp",
        "template_code" => "7000022.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000023.webp",
        "template_code" => "7000023.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000024.webp",
        "template_code" => "7000024.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000025.webp",
        "template_code" => "7000025.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000026.webp",
        "template_code" => "7000026.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000027.webp",
        "template_code" => "7000027.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000028.webp",
        "template_code" => "7000028.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000029.webp",
        "template_code" => "7000029.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000030.webp",
        "template_code" => "7000030.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000031.webp",
        "template_code" => "7000031.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000032.webp",
        "template_code" => "7000032.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000033.webp",
        "template_code" => "7000033.",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000034.png",
        "template_code" => "7000034",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000035.png",
        "template_code" => "7000035",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000036.png",
        "template_code" => "7000036",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Graduation/7000037.png",
        "template_code" => "7000037",
        "category_id" => $categories->where("name" ,"=" ,"Graduation")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000001.webp",
        "template_code" => "4000001.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000002.webp",
        "template_code" => "4000002.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000003.webp",
        "template_code" => "4000003.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000004.webp",
        "template_code" => "4000004.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000005.webp",
        "template_code" => "4000005.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000006.webp",
        "template_code" => "4000006.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000007.webp",
        "template_code" => "4000007.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000008.webp",
        "template_code" => "4000008.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000009.webp",
        "template_code" => "4000009.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000010.webp",
        "template_code" => "4000010.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000011.webp",
        "template_code" => "4000011.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000012.webp",
        "template_code" => "4000012.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000013.webp",
        "template_code" => "4000013.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000014.webp",
        "template_code" => "4000014.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000015.webp",
        "template_code" => "4000015.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000016.webp",
        "template_code" => "4000016.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000017.webp",
        "template_code" => "4000017.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000018.webp",
        "template_code" => "4000018.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000019.webp",
        "template_code" => "4000019.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000020.webp",
        "template_code" => "4000020.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000021.webp",
        "template_code" => "4000021.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000022.webp",
        "template_code" => "4000022.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000023.webp",
        "template_code" => "4000023.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000024.webp",
        "template_code" => "4000024.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000025.webp",
        "template_code" => "4000025.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000026.webp",
        "template_code" => "4000026.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000027.webp",
        "template_code" => "4000027.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000028.webp",
        "template_code" => "4000028.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000029.webp",
        "template_code" => "4000029.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000030.webp",
        "template_code" => "4000030.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000031.webp",
        "template_code" => "4000031.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000032.webp",
        "template_code" => "4000032.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000033.webp",
        "template_code" => "4000033.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000034.webp",
        "template_code" => "4000034.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000035.webp",
        "template_code" => "4000035.",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000036.png",
        "template_code" => "4000036",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000037.png",
        "template_code" => "4000037",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000038.png",
        "template_code" => "4000038",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000039.png",
        "template_code" => "4000039",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Save the Date/4000040.png",
        "template_code" => "4000040",
        "category_id" => $categories->where("name" ,"=" ,"Save the Date")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300001.webp",
        "template_code" => "1300001.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300002.webp",
        "template_code" => "1300002.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300003.webp",
        "template_code" => "1300003.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300004.webp",
        "template_code" => "1300004.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300005.webp",
        "template_code" => "1300005.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300006.webp",
        "template_code" => "1300006.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300007.webp",
        "template_code" => "1300007.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300008.webp",
        "template_code" => "1300008.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300009.webp",
        "template_code" => "1300009.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300010.webp",
        "template_code" => "1300010.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300011.webp",
        "template_code" => "1300011.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300012.webp",
        "template_code" => "1300012.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300013.webp",
        "template_code" => "1300013.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300014.webp",
        "template_code" => "1300014.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300015.webp",
        "template_code" => "1300015.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300016.webp",
        "template_code" => "1300016.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300017.webp",
        "template_code" => "1300017.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300018.webp",
        "template_code" => "1300018.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300019.webp",
        "template_code" => "1300019.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300020.webp",
        "template_code" => "1300020.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300021.webp",
        "template_code" => "1300021.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300022.webp",
        "template_code" => "1300022.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300023.webp",
        "template_code" => "1300023.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300024.webp",
        "template_code" => "1300024.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300025.webp",
        "template_code" => "1300025.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300026.png",
        "template_code" => "1300026",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300027.png",
        "template_code" => "1300027",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300028.png",
        "template_code" => "1300028",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300029.png",
        "template_code" => "1300029",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300030.png",
        "template_code" => "1300030",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300031.png",
        "template_code" => "1300031",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300032.png",
        "template_code" => "1300032",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300033.png",
        "template_code" => "1300033",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300034.png",
        "template_code" => "1300034",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300035.png",
        "template_code" => "1300035",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300036.png",
        "template_code" => "1300036",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300037.png",
        "template_code" => "1300037",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300038.png",
        "template_code" => "1300038",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300039.png",
        "template_code" => "1300039",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300040.png",
        "template_code" => "1300040",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300041.png",
        "template_code" => "1300041",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Engagement Women/1300042.png",
        "template_code" => "1300042",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400001.webp",
        "template_code" => "1400001.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400002.webp",
        "template_code" => "1400002.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400003.webp",
        "template_code" => "1400003.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400004.webp",
        "template_code" => "1400004.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400005.webp",
        "template_code" => "1400005.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400006.webp",
        "template_code" => "1400006.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400007.webp",
        "template_code" => "1400007.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400008.webp",
        "template_code" => "1400008.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400009.webp",
        "template_code" => "1400009.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400010.webp",
        "template_code" => "1400010.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400011.webp",
        "template_code" => "1400011.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400012.webp",
        "template_code" => "1400012.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400013.webp",
        "template_code" => "1400013.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400014.webp",
        "template_code" => "1400014.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400015.webp",
        "template_code" => "1400015.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400016.webp",
        "template_code" => "1400016.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400017.webp",
        "template_code" => "1400017.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400018.webp",
        "template_code" => "1400018.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400019.webp",
        "template_code" => "1400019.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400020.webp",
        "template_code" => "1400020.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400021.webp",
        "template_code" => "1400021.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400022.webp",
        "template_code" => "1400022.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400023.webp",
        "template_code" => "1400023.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400024.webp",
        "template_code" => "1400024.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400025.webp",
        "template_code" => "1400025.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400026.webp",
        "template_code" => "1400026.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400027.webp",
        "template_code" => "1400027.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400028.webp",
        "template_code" => "1400028.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400029.png",
        "template_code" => "1400029",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400030.png",
        "template_code" => "1400030",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400031.png",
        "template_code" => "1400031",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400032.png",
        "template_code" => "1400032",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400033.png",
        "template_code" => "1400033",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400034.png",
        "template_code" => "1400034",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400035.png",
        "template_code" => "1400035",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400036.png",
        "template_code" => "1400036",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400037.png",
        "template_code" => "1400037",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400038.png",
        "template_code" => "1400038",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400039.png",
        "template_code" => "1400039",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400040.png",
        "template_code" => "1400040",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400041.png",
        "template_code" => "1400041",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400042.png",
        "template_code" => "1400042",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400043.png",
        "template_code" => "1400043",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/1400045.png",
        "template_code" => "1400045",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Hennah/4100044.png",
        "template_code" => "4100044",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200001.webp",
        "template_code" => "1200001.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200002.webp",
        "template_code" => "1200002.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200003.webp",
        "template_code" => "1200003.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200004.webp",
        "template_code" => "1200004.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200005.webp",
        "template_code" => "1200005.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200006.webp",
        "template_code" => "1200006.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200007.webp",
        "template_code" => "1200007.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200008.webp",
        "template_code" => "1200008.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200009.webp",
        "template_code" => "1200009.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200010.webp",
        "template_code" => "1200010.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200011.webp",
        "template_code" => "1200011.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200012.webp",
        "template_code" => "1200012.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200013.webp",
        "template_code" => "1200013.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200014.webp",
        "template_code" => "1200014.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200015.webp",
        "template_code" => "1200015.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200016.webp",
        "template_code" => "1200016.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200017.webp",
        "template_code" => "1200017.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200018.webp",
        "template_code" => "1200018.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200019.webp",
        "template_code" => "1200019.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200020.webp",
        "template_code" => "1200020.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200021.webp",
        "template_code" => "1200021.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200022.webp",
        "template_code" => "1200022.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200023.webp",
        "template_code" => "1200023.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200024.webp",
        "template_code" => "1200024.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200025.webp",
        "template_code" => "1200025.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200026.webp",
        "template_code" => "1200026.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200027.webp",
        "template_code" => "1200027.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200028.webp",
        "template_code" => "1200028.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200029.webp",
        "template_code" => "1200029.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200030.webp",
        "template_code" => "1200030.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200031.webp",
        "template_code" => "1200031.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200032.webp",
        "template_code" => "1200032.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200033.webp",
        "template_code" => "1200033.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200034.webp",
        "template_code" => "1200034.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200035.webp",
        "template_code" => "1200035.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200036.webp",
        "template_code" => "1200036.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200037.webp",
        "template_code" => "1200037.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200038.webp",
        "template_code" => "1200038.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200039.webp",
        "template_code" => "1200039.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200040.webp",
        "template_code" => "1200040.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200041.webp",
        "template_code" => "1200041.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200042.webp",
        "template_code" => "1200042.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200043.webp",
        "template_code" => "1200043.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200044.webp",
        "template_code" => "1200044.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200045.webp",
        "template_code" => "1200045.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200046.webp",
        "template_code" => "1200046.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200047.webp",
        "template_code" => "1200047.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200048.webp",
        "template_code" => "1200048.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200049.webp",
        "template_code" => "1200049.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200050.webp",
        "template_code" => "1200050.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200051.png",
        "template_code" => "1200051",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200052.png",
        "template_code" => "1200052",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200053.png",
        "template_code" => "1200053",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200054.png",
        "template_code" => "1200054",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200055.png",
        "template_code" => "1200055",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200056.png",
        "template_code" => "1200056",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200057.png",
        "template_code" => "1200057",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200058.png",
        "template_code" => "1200058",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200059.png",
        "template_code" => "1200059",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200060.png",
        "template_code" => "1200060",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Men/1200061.png",
        "template_code" => "1200061",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100001.webp",
        "template_code" => "1100001.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100002.webp",
        "template_code" => "1100002.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100003.webp",
        "template_code" => "1100003.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100004.webp",
        "template_code" => "1100004.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100005.webp",
        "template_code" => "1100005.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100006.webp",
        "template_code" => "1100006.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100007.webp",
        "template_code" => "1100007.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100008.webp",
        "template_code" => "1100008.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100009.webp",
        "template_code" => "1100009.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100010.webp",
        "template_code" => "1100010.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100011.webp",
        "template_code" => "1100011.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100012.webp",
        "template_code" => "1100012.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100013.webp",
        "template_code" => "1100013.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100014.webp",
        "template_code" => "1100014.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100015.webp",
        "template_code" => "1100015.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100016.webp",
        "template_code" => "1100016.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100017.webp",
        "template_code" => "1100017.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100018.webp",
        "template_code" => "1100018.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100019.webp",
        "template_code" => "1100019.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100020.webp",
        "template_code" => "1100020.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100021.webp",
        "template_code" => "1100021.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100022.webp",
        "template_code" => "1100022.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100023.webp",
        "template_code" => "1100023.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100024.webp",
        "template_code" => "1100024.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100025.webp",
        "template_code" => "1100025.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100026.webp",
        "template_code" => "1100026.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100027.webp",
        "template_code" => "1100027.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100028.webp",
        "template_code" => "1100028.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100029.webp",
        "template_code" => "1100029.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100030.webp",
        "template_code" => "1100030.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100031.webp",
        "template_code" => "1100031.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100032.webp",
        "template_code" => "1100032.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100033.webp",
        "template_code" => "1100033.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100034.webp",
        "template_code" => "1100034.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100035.webp",
        "template_code" => "1100035.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100036.webp",
        "template_code" => "1100036.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100037.webp",
        "template_code" => "1100037.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100038.webp",
        "template_code" => "1100038.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100039.webp",
        "template_code" => "1100039.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100040.webp",
        "template_code" => "1100040.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100041.webp",
        "template_code" => "1100041.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100042.webp",
        "template_code" => "1100042.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100043.webp",
        "template_code" => "1100043.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100044.webp",
        "template_code" => "1100044.",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100045.png",
        "template_code" => "1100045",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100046.png",
        "template_code" => "1100046",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100047.png",
        "template_code" => "1100047",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100048.png",
        "template_code" => "1100048",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100049.png",
        "template_code" => "1100049",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],[
        "image" => "/Invitations/Wedding/Wedding Women/1100050.png",
        "template_code" => "1100050",
        "category_id" => $categories->where("name" ,"=" ,"Wedding")->first()?->id,
    ],];
            DB::table('templates')->insert($templateData);
        
    }
}
