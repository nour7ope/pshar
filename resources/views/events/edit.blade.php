@extends('layout.app')

@section('title', 'تعديل الفعالية - ' . $event->title)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl card-shadow overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white">
                <h2 class="text-2xl font-bold">تعديل الفعالية</h2>
                <p class="mt-1 opacity-90">قم بتحديث بيانات الفعالية: {{ $event->title }}</p>
            </div>

            <div class="p-6">
                <form action="{{ route('events.update', $event) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-heading text-blue-500 ml-2"></i>عنوان الفعالية *
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="أدخل عنوان الفعالية" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-plus text-green-500 ml-2"></i>تاريخ البداية *
                            </label>
                            <input type="datetime-local" name="start_date" id="start_date"
                                value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required>
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-minus text-red-500 ml-2"></i>تاريخ النهاية *
                            </label>
                            <input type="datetime-local" name="end_date" id="end_date"
                                value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required>
                            @error('end_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-orange-500 ml-2"></i>الموقع
                            </label>
                            <input type="text" name="location" id="location"
                                value="{{ old('location', $event->location) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="أدخل موقع الفعالية">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Max Attendees -->
                        <div>
                            <label for="max_attendees" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-users text-purple-500 ml-2"></i>الحد الأقصى للحضور
                            </label>
                            <input type="number" name="max_attendees" id="max_attendees"
                                value="{{ old('max_attendees', $event->max_attendees) }}" min="1"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="اتركه فارغاً للحضور غير المحدود">
                            @error('max_attendees')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="md:col-span-2">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-flag text-indigo-500 ml-2"></i>حالة الفعالية *
                            </label>
                            <select name="status" id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required>
                                <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>
                                    نشطة
                                </option>
                                <option value="completed"
                                    {{ old('status', $event->status) == 'completed' ? 'selected' : '' }}>
                                    مكتملة
                                </option>
                                <option value="cancelled"
                                    {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>
                                    ملغية
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-align-left text-gray-500 ml-2"></i>وصف الفعالية
                            </label>
                            {{-- <textarea name="description" id="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" --}}
                            {{-- boot --}}
                            <textarea name="description" id="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="أدخل وصفاً تفصيلياً للفعالية">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('events.index') }}"
                            class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors duration-200">
                            <i class="fas fa-arrow-right ml-2"></i>إلغاء
                        </a>
                        <button type="submit" class="btn-primary text-white px-8 py-3 rounded-lg font-semibold">
                            <i class="fas fa-save ml-2"></i>حفظ الفعالية
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // التحقق من أن تاريخ النهاية بعد تاريخ البداية
        document.getElementById('start_date').addEventListener('change', function() {
            document.getElementById('end_date').min = this.value;
        });

        document.getElementById('end_date').addEventListener('change', function() {
            const startDate = document.getElementById('start_date').value;
            if (startDate && this.value < startDate) {
                alert('تاريخ النهاية يجب أن يكون بعد تاريخ البداية');
                this.value = '';
            }
        });
    </script>
@endsection
