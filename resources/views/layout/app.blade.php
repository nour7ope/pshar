<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'إدارة الفعاليات')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <i class="fas fa-calendar-alt text-2xl"></i>
                    <h1 class="text-2xl font-bold">نظام إدارة الفعاليات</h1>
                </div>
                <nav class="flex space-x-6 space-x-reverse">
                    <a href="{{ route('dashboard') }}"
                        class="hover:text-blue-200 transition-colors duration-200 flex items-center">
                        <i class="fas fa-home ml-2"></i>الرئيسية
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="hover:text-blue-200 transition-colors duration-200 flex items-center">
                        <i class="fas fa-calendar ml-2"></i>الفعاليات
                    </a>
                    <a href="{{ route('events.create') }}"
                        class="hover:text-blue-200 transition-colors duration-200 flex items-center">
                        <i class="fas fa-plus ml-2"></i>إضافة فعالية
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg mb-6 card-shadow">
                <div class="flex items-center">
                    <i class="fas fa-check-circle ml-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white px-6 py-4 rounded-lg mb-6 card-shadow">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle ml-2"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} نظام إدارة الفعاليات. جميع الحقوق محفوظة.</p>
    </footer>

    <script>
        // إخفاء الرسائل تلقائياً بعد 5 ثوانٍ
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-green-500, .bg-red-500');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>

</html>
