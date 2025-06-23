<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الفعاليات - مرحباً بك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-bg-2 {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
        }

        .gradient-bg-3 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: particle-float 15s infinite linear;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff6b6b, #ffd93d);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff5252, #ffcc02);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #3b9cff, #00e5ff);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 172, 254, 0.3);
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-10px) scale(1.02);
        }

        .stats-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            transition: all 0.4s ease;
        }

        .stats-card:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-8px) rotateY(5deg);
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .pricing-card:hover {
            transform: translateY(-15px);
            border: 2px solid rgba(255, 107, 107, 0.3);
        }

        .pricing-card.featured {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 217, 61, 0.1));
            border: 2px solid rgba(255, 107, 107, 0.5);
        }

        .slide-in {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.6s ease;
        }

        .slide-in.active {
            opacity: 1;
            transform: translateX(0);
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 60px;
        }

        .wave .shape-fill {
            fill: #FFFFFF;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body class="min-h-screen gradient-bg overflow-x-hidden">
    <!-- Floating Particles -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="particle w-2 h-2" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle w-3 h-3" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle w-1 h-1" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle w-2 h-2" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle w-1 h-1" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle w-3 h-3" style="left: 60%; animation-delay: 10s;"></div>
        <div class="particle w-2 h-2" style="left: 70%; animation-delay: 12s;"></div>
        <div class="particle w-1 h-1" style="left: 80%; animation-delay: 14s;"></div>
        <div class="particle w-2 h-2" style="left: 90%; animation-delay: 16s;"></div>
    </div>

    <!-- Navigation -->
    <nav class="glass-effect fixed top-0 w-full z-50 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-reverse space-x-3">
                <i class="fas fa-calendar-alt text-white text-2xl"></i>
                <h1 class="text-white text-xl font-bold">إدارة الفعاليات</h1>
            </div>
            <div class="flex items-center space-x-reverse space-x-4">
                <form method="GET" action="{{ route('login') }}">
                    <button id="loginBtn"
                        class="text-white hover:text-yellow-300 transition-colors px-4 py-2 rounded-lg hover:bg-white/10">
                        <i class="fas fa-sign-in-alt ml-2"></i>
                        تسجيل الدخول
                    </button>
                </form>
                <form method="GET" action="{{ route('register') }}">
                    <button id="registerBtn"
                        class="text-white hover:text-yellow-300 transition-colors px-4 py-2 rounded-lg hover:bg-white/10">
                        <i class="fas fa-user-plus ml-2"></i>
                        إنشاء حساب
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center px-6 pt-20">
        <div class="text-center max-w-4xl mx-auto">
            <div class="floating-animation mb-8">
                <i class="fas fa-calendar-check text-white text-8xl mb-6"></i>
            </div>

            <h1 class="text-white text-5xl md:text-7xl font-bold mb-6 leading-tight">
                أهلاً بك في
                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                    إدارة الفعاليات
                </span>
            </h1>

            <p class="text-white/90 text-xl md:text-2xl mb-12 leading-relaxed">
                منصة شاملة لتنظيم وإدارة جميع فعالياتك بسهولة وإبداع
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                <form method="GET" action="{{ route('dash') }}">
                    <button id="createEventBtn"
                        class="btn-primary px-10 py-4 rounded-full text-white font-bold text-lg hover-scale">
                        <i class="fas fa-plus-circle ml-3"></i>
                        إنشاء فعالية جديدة
                    </button>
                </form>
                <button class="glass-effect text-white px-10 py-4 rounded-full font-bold text-lg hover-scale">
                    <i class="fas fa-play ml-3"></i>
                    شاهد العرض التوضيحي
                </button>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mt-20">
                <div class="feature-card rounded-2xl p-8 hover-scale fade-in">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h3 class="text-gray-800 text-xl font-bold mb-3">إنشاء الفعاليات</h3>
                    <p class="text-gray-600">قم بإنشاء وتخصيص فعالياتك بسهولة مع أدوات متقدمة للتحكم الكامل</p>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale fade-in">
                    <div class="text-green-600 text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-gray-800 text-xl font-bold mb-3">إدارة المشاركين</h3>
                    <p class="text-gray-600">تتبع وإدارة المشاركين والحضور مع إحصائيات مفصلة وتقارير شاملة</p>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale fade-in">
                    <div class="text-purple-600 text-4xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-gray-800 text-xl font-bold mb-3">تقارير وإحصائيات</h3>
                    <p class="text-gray-600">احصل على رؤى عميقة حول أداء فعالياتك مع تقارير تفاعلية ومرئية</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 gradient-bg-2 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">أرقام تتحدث عن نفسها</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">نحن فخورون بما حققناه مع عملائنا الكرام</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="stats-card rounded-2xl p-8 text-center hover-scale">
                    <div class="text-5xl font-bold text-blue-600 mb-4 pulse-animation">1,250+</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">فعالية منظمة</h3>
                    <p class="text-gray-600">فعالية ناجحة تم تنظيمها بشكل احترافي</p>
                </div>

                <div class="stats-card rounded-2xl p-8 text-center hover-scale">
                    <div class="text-5xl font-bold text-green-600 mb-4 pulse-animation">50,000+</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">مشارك سعيد</h3>
                    <p class="text-gray-600">مشارك استفاد من فعالياتنا المتميزة</p>
                </div>

                <div class="stats-card rounded-2xl p-8 text-center hover-scale">
                    <div class="text-5xl font-bold text-purple-600 mb-4 pulse-animation">99%</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">نسبة الرضا</h3>
                    <p class="text-gray-600">من عملائنا راضون عن خدماتنا</p>
                </div>

                <div class="stats-card rounded-2xl p-8 text-center hover-scale">
                    <div class="text-5xl font-bold text-orange-600 mb-4 pulse-animation">24/7</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">دعم متواصل</h3>
                    <p class="text-gray-600">دعم فني على مدار الساعة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 gradient-bg-3">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">خدماتنا المتميزة</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">نقدم مجموعة شاملة من الخدمات لضمان نجاح فعاليتك</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-indigo-600 text-4xl mb-6">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">التسويق الرقمي</h3>
                    <p class="text-gray-600 mb-6">حملات تسويقية متقدمة لضمان وصول فعاليتك للجمهور المناسب</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>إدارة وسائل التواصل الاجتماعي</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>حملات البريد الإلكتروني</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>الإعلانات المدفوعة</li>
                    </ul>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-red-600 text-4xl mb-6">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">البث المباشر</h3>
                    <p class="text-gray-600 mb-6">خدمات بث مباشر احترافية للوصول لجمهور أوسع</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>بث عالي الجودة</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تفاعل مع الجمهور</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تسجيل وأرشفة</li>
                    </ul>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-yellow-600 text-4xl mb-6">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">تطبيق الفعالية</h3>
                    <p class="text-gray-600 mb-6">تطبيق مخصص لفعاليتك لتحسين تجربة المشاركين</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>جدولة الفعاليات</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>شبكة تواصل</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>إشعارات فورية</li>
                    </ul>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-pink-600 text-4xl mb-6">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">الدعم الفني</h3>
                    <p class="text-gray-600 mb-6">فريق دعم متخصص لضمان سير فعاليتك بسلاسة</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>دعم على مدار الساعة</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>مساعدة تقنية فورية</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تدريب المستخدمين</li>
                    </ul>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-teal-600 text-4xl mb-6">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">الأمان والخصوصية</h3>
                    <p class="text-gray-600 mb-6">حماية متقدمة لبياناتك وبيانات المشاركين</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تشفير البيانات</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>نسخ احتياطية</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>امتثال للمعايير</li>
                    </ul>
                </div>

                <div class="feature-card rounded-2xl p-8 hover-scale slide-in">
                    <div class="text-cyan-600 text-4xl mb-6">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">التكامل والتخصيص</h3>
                    <p class="text-gray-600 mb-6">إمكانيات تكامل مع أنظمتك الحالية وتخصيص كامل</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تكامل مع CRM</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>API متقدمة</li>
                        <li><i class="fas fa-check text-green-500 ml-2"></i>تخصيص الواجهات</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 gradient-bg relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">آراء عملائنا</h2>
                <p class="text-xl text-white/90 max-w-2xl mx-auto">اكتشف كيف ساعدنا عملاءنا في تحقيق النجاح</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="testimonial-card rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="font-bold text-gray-800">أحمد محمد</h4>
                            <p class="text-gray-600 text-sm">مدير شركة التقنية الحديثة</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">"منصة رائعة سهلت علينا تنظيم مؤتمرنا السنوي. الدعم الفني ممتاز
                        والميزات شاملة."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="font-bold text-gray-800">سارة أحمد</h4>
                            <p class="text-gray-600 text-sm">منظمة فعاليات مستقلة</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">"لا أستطيع تخيل تنظيم فعالياتي بدون هذه المنصة. كل شيء مدروس ومنظم
                        بشكل مثالي."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <div>
                            <h4 class="font-bold text-gray-800">محمد علي</h4>
                            <p class="text-gray-600 text-sm">مدير التسويق</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">"التقارير والإحصائيات التي تقدمها المنصة ساعدتنا كثيراً في تحسين
                        فعالياتنا المستقبلية."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">خطط الأسعار</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">اختر الخطة التي تناسب احتياجاتك وميزانيتك</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Basic Plan -->
                <div class="pricing-card rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">الخطة الأساسية</h3>
                        <div class="text-4xl font-bold text-blue-600 mb-2">
                            99 دولار
                            <span class="text-lg text-gray-600 font-normal">/شهرياً</span>
                        </div>
                        <p class="text-gray-600">مثالية للفعاليات الصغيرة</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>حتى 100 مشارك</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>5 فعاليات شهرياً</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>تقارير أساسية</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>دعم فني عبر البريد</span>
                        </li>
                    </ul>

                    <button class="w-full btn-secondary py-3 rounded-lg text-white font-bold">
                        اختيار الخطة
                    </button>
                </div>

                <!-- Professional Plan -->
                <div class="pricing-card featured rounded-2xl p-8 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span
                            class="bg-gradient-to-r from-orange-400 to-pink-400 text-white px-6 py-2 rounded-full text-sm font-bold">الأكثر
                            شعبية</span>
                    </div>

                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">الخطة الاحترافية</h3>
                        <div class="text-4xl font-bold text-orange-600 mb-2">
                            249 دولار
                            <span class="text-lg text-gray-600 font-normal">/شهرياً</span>
                        </div>
                        <p class="text-gray-600">الأنسب للشركات المتوسطة</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>حتى 500 مشارك</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>فعاليات غير محدودة</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>تقارير متقدمة</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>بث مباشر</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>دعم فني مباشر</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>تطبيق مخصص</span>
                        </li>
                    </ul>

                    <button class="w-full btn-primary py-3 rounded-lg text-white font-bold">
                        اختيار الخطة
                    </button>
                </div>

                <!-- Enterprise Plan -->
                <div class="pricing-card rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">خطة المؤسسات</h3>
                        <div class="text-4xl font-bold text-purple-600 mb-2">
                            499 دولار
                            <span class="text-lg text-gray-600 font-normal">/شهرياً</span>
                        </div>
                        <p class="text-gray-600">للمؤسسات الكبيرة</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>مشاركين غير محدودين</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>فعاليات غير محدودة</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>تقارير شاملة ومخصصة</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>بث مباشر احترافي</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>دعم فني مخصص 24/7</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>تكامل مع الأنظمة</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-3"></i>
                            <span>مدير حساب مخصص</span>
                        </li>
                    </ul>

                    <button class="w-full btn-secondary py-3 rounded-lg text-white font-bold">
                        تواصل معنا
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg relative">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    هل أنت مستعد لبدء رحلتك؟
                </h2>
                <p class="text-xl text-white/90 mb-12 leading-relaxed">
                    انضم إلى آلاف المنظمين الذين يثقون بنا لإدارة فعالياتهم بنجاح
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <button class="btn-primary px-12 py-4 rounded-full text-white font-bold text-lg hover-scale">
                        <i class="fas fa-rocket ml-3"></i>
                        ابدأ الآن مجاناً
                    </button>

                    <button class="glass-effect text-white px-12 py-4 rounded-full font-bold text-lg hover-scale">
                        <i class="fas fa-phone ml-3"></i>
                        تواصل معنا
                    </button>
                </div>
            </div>
        </div>

        <!-- Wave Shape -->
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-reverse space-x-3">
                        <i class="fas fa-calendar-alt text-orange-400 text-3xl"></i>
                        <h3 class="text-2xl font-bold">إدارة الفعاليات</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        منصة متكاملة تساعدك على تنظيم وإدارة فعالياتك بطريقة احترافية وسهلة، مع ميزات متقدمة وتقارير
                        شاملة.
                    </p>
                    <div class="flex space-x-reverse space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors text-xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors text-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors text-xl">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors text-xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-orange-400">روابط سريعة</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                الرئيسية
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                عن الشركة
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                الخدمات
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                الأسعار
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                المدونة
                            </a></li>
                        <li><a href="#footer"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                تواصل معنا
                            </a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-orange-400">خدماتنا</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                إنشاء الفعاليات
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                إدارة المشاركين
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                التسويق الرقمي
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                البث المباشر
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                التقارير والإحصائيات
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-left text-xs ml-2 text-orange-400"></i>
                                الدعم الفني
                            </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-orange-400">معلومات التواصل</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-reverse space-x-3">
                            <i class="fas fa-map-marker-alt text-orange-400 text-lg mt-1"></i>
                            <div>
                                <p class="text-gray-400">سورية،المدينة دمشق</p>
                                <p class="text-gray-400">مساكن برزة مقابل شركة الهرم</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-reverse space-x-3">
                            <i class="fas fa-phone text-orange-400 text-lg"></i>
                            <div>
                                <p class="text-gray-400" dir="ltr">+963 988 258 274</p>
                                <p class="text-gray-400" dir="ltr">+963 954 666 195</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-reverse space-x-3">
                            <i class="fas fa-envelope text-orange-400 text-lg"></i>
                            <div>
                                <p class="text-gray-400">basharaomran6@gmail.com</p>
                                <p class="text-gray-400">ahmedaomran6@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-reverse space-x-3">
                            <i class="fas fa-clock text-orange-400 text-lg"></i>
                            <div>
                                <p class="text-gray-400">الأحد - الخميس: 9:00 - 18:00</p>
                                <p class="text-gray-400">الجمعة - السبت: مغلق</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-6 md:mb-0">
                        <h4 class="text-xl font-bold mb-2 text-orange-400">اشترك في نشرتنا الإخبارية</h4>
                        <p class="text-gray-400">احصل على آخر الأخبار والتحديثات والعروض الحصرية</p>
                    </div>

                    <div class="flex w-full md:w-auto">
                        <input type="email" placeholder="أدخل بريدك الإلكتروني"
                            class="px-4 py-3 bg-gray-800 text-white rounded-r-lg border border-gray-700 focus:outline-none focus:border-orange-400 flex-1 md:w-80">
                        <button class="btn-primary px-6 py-3 rounded-l-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 md:mb-0">
                        © 2025 إدارة الفعاليات. جميع الحقوق محفوظة.
                    </p>

                    <div class="flex space-x-reverse space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">شروط الاستخدام</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">ملفات الارتباط</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
