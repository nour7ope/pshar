@extends('layout.app')

@section('title', 'إدارة الفعاليات')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">إدارة الفعاليات</h2>
                <p class="text-gray-600 mt-2">عرض وإدارة جميع الفعاليات</p>
            </div>
            <a href="{{ route('events.create') }}" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold">
                <i class="fas fa-plus ml-2"></i>إضافة فعالية جديدة
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg p-6 card-shadow">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full ml-4">
                        <i class="fas fa-calendar text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">إجمالي الفعاليات</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 card-shadow">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-full ml-4">
                        <i class="fas fa-play text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">النشطة</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['active'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 card-shadow">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-3 rounded-full ml-4">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">القادمة</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['upcoming'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 card-shadow">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full ml-4">
                        <i class="fas fa-check text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">المكتملة</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['completed'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Table -->
        <div class="bg-white rounded-xl card-shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">قائمة الفعاليات</h3>
            </div>

            @if ($events->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    العنوان
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    تاريخ البداية
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    الموقع
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    الحالة
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    الحد الأقصى للحضور
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    الإجراءات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($events as $event)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                            @if ($event->description)
                                                <div class="text-sm text-gray-500">{{ Str::limit($event->description, 50) }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $event->start_date->format('Y/m/d H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $event->location ?? 'غير محدد' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $event->status_color }}">
                                            {{ $event->status_text }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $event->max_attendees ?: 'غير محدود' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2 space-x-reverse">
                                            <a href="{{ route('events.show', $event) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('events.edit', $event) }}"
                                                class="text-yellow-600 hover:text-yellow-900">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذه الفعالية؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $events->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">لا توجد فعاليات</h3>
                    <p class="text-gray-500 mb-6">ابدأ بإنشاء فعالية جديدة</p>
                    <a href="{{ route('events.create') }}"
                        class="btn-primary text-white px-6 py-3 rounded-lg font-semibold">
                        <i class="fas fa-plus ml-2"></i>إضافة فعالية جديدة
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
