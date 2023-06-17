php artisan make : controoler API/productController --api

controller
index()
{
return product::paginate();
برجع المنتجات برجع كلكشن بترجعها تلقائي لجيسون
لما بدي امرر متغير
}
بالموديل
public function scopeFiltter(Builder $filter)
{
$options = array_merger([
'store_id='null
tage=[],
'status =>'active,
$fillters'])
مرر 2 array بعمل أوفر رايت ع الأريه الي جياني عشان معملش if  or
$builder->when($options['store_id],function($builder,$value))
$builder->where('store_id',$value)
}
$builder->when($options['tage_id],function($builder,$value))
$builder->wherehas('tage',function()في تكملة بس زهقت ))راح ترجع حميع البرودكس الي الهم تاجز ريلشن
}
ملف الراوت api راوت
    Route::get('/product'.[productController::class,'index''])
or
Route::apiResourc('/product',productController::class])
// postman
بعمل collection برتب الملفات وبعمل ملف وبعمل ركستات وبعمل شير مع اي حد
  // عشان ابين الخطأ jsoin مش view بروح ع headerبضيف accept والقيمة application/json
//لو في متغيرات بدي امررها
بروح params وبضيف وبعطيع القيمة وبعملsaveمثال gategory_id = 1 راح يجيبكل تصنيفات الواحد
//لو بدي أخفي حقول من الريكوست الي جايني
بروح  $ model prodected $hiddin
هان الارافيل بتفهين انو كل ما ستدعي بيانات jasoi اخفيلي اياها
//لو عندي ريلاشن وبدي احملها وأحدد اش يجي معاها
->with('category:name,id','tage')
لازم امرر ال id عشان حتى لو مش محتاجو لازم امررور لانو لارافيل راح تربط فيه
//الصوررر
موضوع الصورة الموبايل ديفلوبر بدو مسار الصورة مش مكان
فالحل : أروح ع model
أضيف كود
وبعدين بعمل ابيدن بالموديل باسم الاكسسوري
producted $appends =[اسم]
//  14.2 - API Resources
  بستغني عن apppens, hiddenلما بدي أغير اسماء الحقول الي جاياني من داتا بيس ع مستوى موديل
php artisan make:resources ProductResorurces
بعملو زي صورة
بالكنترولا
new ProductResorurces($product)
عشان اقيم data
f 4

/////API Auth
2 باسبورت (لما أستخدم التسجيل باستخدام فيس..)
()sunctum ممكن تعمل أكسس ع أكتر من جهاز
 personal_access_tokenفي جدول بالداتا
name (بخزن فيه اسم الجهاز)
abilites (صلاحيات)
ملف config /sunctaum
//بدي أعمل api login
fulg controller accessTokenController
لازم بموديل تاي راح اكريت عليه التوكن يكون بالموديل مستخدم
use HasApiTOKENS

