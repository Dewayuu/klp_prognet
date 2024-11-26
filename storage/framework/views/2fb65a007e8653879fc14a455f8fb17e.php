<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Contacts <?php $__env->endSlot(); ?>

    <!-- Jika tidak ada kontak, tampilkan pesan -->
    <?php if($contact->isEmpty()): ?>
        <div class="text-center text-gray-500">
            <p>No contacts found. Please add a contact.</p>
        </div>
    <?php else: ?>
        <!-- Daftar kontak menggunakan grid layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kontak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Gambar Kontak -->
                    <img class="w-full h-48 object-cover" src="https://picsum.photos/100/100?random=<?php echo e(rand()); ?>" alt="">
                    
                    <!-- Informasi Kontak -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white"><?php echo e($kontak['nama']); ?></h3>
                        <p class="text-gray-600 dark:text-gray-400"><?php echo e($kontak['alamat']); ?></p>
                        <p class="text-gray-600 dark:text-gray-400">Phone: <?php echo e($kontak['telepon']); ?></p>
                        <p class="text-gray-600 dark:text-gray-400">Email: <?php echo e($kontak['email']); ?></p>
                        <p class="text-gray-600 dark:text-gray-400">Birthday: <?php echo e($kontak['lahir']); ?></p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between p-4 bg-gray-100">
                        <div class="flex space-x-5 ml-auto">
                            <!-- Edit Button -->
                            <button onclick="location.href='<?php echo e(route('contacts.edit', $kontak['id'])); ?>'" class="text-blue-600 hover:text-blue-800 font-medium">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="<?php echo e(route('contacts.destroy', $kontak['id'])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <!-- Tombol "Tambah Kontak" di bawah daftar kontak -->
    <div class="mt-8 text-center">
        <button onclick="location.href='<?php echo e(route('contacts.create')); ?>'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah Kontak
        </button>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projectprognet\resources\views/contacts.blade.php ENDPATH**/ ?>