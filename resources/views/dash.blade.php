@extends('layout.app')

@section('title', 'الصفحة الرئيسية - إدارة الفعاليات')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">مرحباً بك في نظام إدارة الفعاليات</h2>
            <p class="text-xl text-gray-600">إدارة شاملة وسهلة لجميع فعالياتك</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl p-6 card-shadow hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">إجمالي الفعاليات</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['total'] }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-calendar text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 card-shadow hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">الفعاليات النشطة</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['active'] }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-play text-green-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 card-shadow hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">الفعاليات القادمة</p>
                        <p class="text-3xl font-bold text-orange-600">{{ $stats['upcoming'] }}</p>
                    </div>
                    <div class="bg-orange-100 p-3 rounded-full">
                        <i class="fas fa-clock text-orange-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 card-shadow hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">فعاليات هذا الشهر</p>
                        <p class="text-3xl font-bold text-purple-600">{{ $stats['this_month'] }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-calendar-week text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl p-6 card-shadow">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">إجراءات سريعة</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('events.create') }}"
                    class="btn-primary text-white px-6 py-4 rounded-lg text-center font-semibold hover:transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-plus ml-2"></i>إنشاء فعالية جديدة
                </a>
                <a href="{{ route('events.index') }}"
                    class="bg-gray-600 text-white px-6 py-4 rounded-lg text-center font-semibold hover:bg-gray-700 hover:transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-list ml-2"></i>عرض جميع الفعاليات
                </a>
                <a href="{{ route('events.index', ['status' => 'active']) }}"
                    class="bg-green-600 text-white px-6 py-4 rounded-lg text-center font-semibold hover:bg-green-700 hover:transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-eye ml-2"></i>الفعاليات النشطة
                </a>
            </div>
        </div>

        <!-- Upcoming Events and Recent Events -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Upcoming Events -->
            <div class="bg-white rounded-xl p-6 card-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-clock text-orange-500 ml-2"></i>الفعاليات القادمة
                </h3>
                @if ($upcomingEvents->count() > 0)
                    <div class="space-y-4">
                        @foreach ($upcomingEvents as $event)
                            <div
                                class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors duration-200">
                                <h4 class="font-semibold text-gray-800">{{ $event->title }}</h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    <i class="fas fa-calendar ml-1"></i>
                                    {{ $event->start_date->format('Y/m/d - H:i') }}
                                </p>
                                @if ($event->location)
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt ml-1"></i>
                                        {{ $event->location }}
                                    </p>
                                @endif
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $event->status_color }}">
                                        {{ $event->status_text }}
                                    </span>
                                    <a href="{{ route('events.show', $event) }}"
                                        class="text-blue-600 hover:text-blue-800 text-sm">
                                        عرض التفاصيل
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-calendar-times text-4xl mb-4"></i>
                        <p>لا توجد فعاليات قادمة</p>
                    </div>
                @endif
            </div>

            <!-- Recent Events -->
            <div class="bg-white rounded-xl p-6 card-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-history text-blue-500 ml-2"></i>الفعاليات الأخيرة
                </h3>
                @if ($recentEvents->count() > 0)
                    <div class="space-y-4">
                        @foreach ($recentEvents as $event)
                            <div
                                class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors duration-200">
                                <h4 class="font-semibold text-gray-800">{{ $event->title }}</h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    <i class="fas fa-calendar ml-1"></i>
                                    {{ $event->start_date->format('Y/m/d - H:i') }}
                                </p>
                                @if ($event->location)
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt ml-1"></i>
                                        {{ $event->location }}
                                    </p>
                                @endif
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $event->status_color }}">
                                        {{ $event->status_text }}
                                    </span>
                                    <a href="{{ route('events.show', $event) }}"
                                        class="text-blue-600 hover:text-blue-800 text-sm">
                                        عرض التفاصيل
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-calendar-times text-4xl mb-4"></i>
                        <p>لا توجد فعاليات</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
