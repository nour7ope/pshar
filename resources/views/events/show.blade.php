@extends('layout.app')

@section('title', $event->title)

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-xl card-shadow overflow-hidden mb-8">
            <div class="px-8 py-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
                        <div class="flex items-center mt-2 space-x-4 space-x-reverse">
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $event->status_color }}">
                                {{ $event->status_text }}
                            </span>
                            @if ($event->is_upcoming)
                                <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm font-medium">
                                    قادمة
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex space-x-2 space-x-reverse">
                        <a href="{{ route('events.edit', $event) }}"
                            class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-edit ml-2"></i>تعديل
                        </a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline"
                            onsubmit="return confirm('هل أنت متأكد من حذف هذه الفعالية؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-200">
                                <i class="fas fa-trash ml-2"></i>حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl card-shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">تفاصيل الفعالية</h2>

                    @if ($event->description)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-700 mb-3">الوصف</h3>
                            <div class="text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-lg">
                                {{ $event->description }}
                            </div>
                        </div>
                    @endif

                    <!-- Timeline -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">الجدول الزمني</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-green-50 rounded-lg">
                                <div class="bg-green-500 text-white p-3 rounded-full ml-4">
                                    <i class="fas fa-play"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">بداية الفعالية</p>
                                    <p class="text-gray-600">{{ $event->start_date->format('l, Y/m/d - H:i') }}</p>
                                    <p class="text-sm text-gray-500">{{ $event->start_date->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-red-50 rounded-lg">
                                <div class="bg-red-500 text-white p-3 rounded-full ml-4">
                                    <i class="fas fa-stop"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">نهاية الفعالية</p>
                                    <p class="text-gray-600">{{ $event->end_date->format('l, Y/m/d - H:i') }}</p>
                                    <p class="text-sm text-gray-500">{{ $event->end_date->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">مدة الفعالية</h3>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-blue-500 text-xl ml-3"></i>
                                <span class="text-lg font-semibold text-gray-800">
                                    {{ $event->start_date->diffInDays($event->end_date) }} يوم،
                                    {{ $event->start_date->diffInHours($event->end_date) % 24 }} ساعة
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Information -->
            <div class="space-y-6">
                <!-- Quick Info -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">معلومات سريعة</h3>
                    <div class="space-y-4">
                        @if ($event->location)
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-orange-500 ml-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">الموقع</p>
                                    <p class="font-medium text-gray-800">{{ $event->location }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($event->max_attendees)
                            <div class="flex items-center">
                                <i class="fas fa-users text-purple-500 ml-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">الحد الأقصى للحضور</p>
                                    <p class="font-medium text-gray-800">{{ $event->max_attendees }} شخص</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <i class="fas fa-calendar-plus text-blue-500 ml-3"></i>
                            <div>
                                <p class="text-sm text-gray-600">تاريخ الإنشاء</p>
                                <p class="font-medium text-gray-800">{{ $event->created_at->format('Y/m/d') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <i class="fas fa-clock text-gray-500 ml-3"></i>
                            <div>
                                <p class="text-sm text-gray-600">آخر تحديث</p>
                                <p class="font-medium text-gray-800">{{ $event->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">إجراءات</h3>
                    <div class="space-y-3">
                        <a href="{{ route('events.edit', $event) }}"
                            class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center">
                            <i class="fas fa-edit ml-2"></i>تعديل الفعالية
                        </a>

                        <a href="{{ route('events.index') }}"
                            class="w-full bg-gray-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center">
                            <i class="fas fa-list ml-2"></i>عرض جميع الفعاليات
                        </a>

                        <form action="{{ route('events.destroy', $event) }}" method="POST"
                            onsubmit="return confirm('هل أنت متأكد من حذف هذه الفعالية؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-red-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-trash ml-2"></i>حذف الفعالية
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Status Info -->
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">حالة الفعالية</h3>
                    <div class="text-center">
                        <div
                            class="inline-flex items-center px-4 py-2 rounded-full text-lg font-medium {{ $event->status_color }}">
                            <i class="fas fa-circle ml-2 text-xs"></i>
                            {{ $event->status_text }}
                        </div>

                        @if ($event->is_upcoming)
                            <div class="mt-4 p-3 bg-green-50 rounded-lg">
                                <p class="text-sm text-green-800">
                                    <i class="fas fa-info-circle ml-1"></i>
                                    هذه الفعالية قادمة ولم تبدأ بعد
                                </p>
                            </div>
                        @elseif($event->start_date->isPast() && $event->end_date->isFuture())
                            <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                                <p class="text-sm text-blue-800">
                                    <i class="fas fa-play-circle ml-1"></i>
                                    هذه الفعالية جارية حالياً
                                </p>
                            </div>
                        @elseif($event->end_date->isPast())
                            <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-800">
                                    <i class="fas fa-check-circle ml-1"></i>
                                    انتهت هذه الفعالية
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
