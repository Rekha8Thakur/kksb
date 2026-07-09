<x-admin-layout>
    <x-slot name="title">Manage Authors</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Authors</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Manage writer profiles, bios and social links for blogs.</p>
            </div>
            <a href="{{ route('admin.authors.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Author</span>
            </a>
        </div>

        <!-- Authors Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($authors as $author)
                <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-4 mb-4">
                            @if($author->avatar)
                                <img src="{{ asset($author->avatar) }}" class="w-14 h-14 rounded-full object-cover border border-gray-200 dark:border-zinc-700" alt="">
                            @else
                                <div class="w-14 h-14 rounded-full bg-zinc-150 dark:bg-zinc-800 flex items-center justify-center font-bold text-zinc-500 text-lg uppercase">
                                    {{ substr($author->name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">{{ $author->name }}</h3>
                                <div class="text-xs text-gray-400">Writer / Creator</div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-zinc-350 line-clamp-3 mb-4">
                            {{ $author->bio ?? 'No bio written yet.' }}
                        </p>
                    </div>

                    <div class="border-t border-gray-100 dark:border-zinc-800 pt-4 flex items-center justify-between">
                        <!-- Socials indicators -->
                        <div class="flex space-x-2 text-gray-400">
                            @if(!empty($author->social_links['instagram']))
                                <a href="{{ $author->social_links['instagram'] }}" target="_blank" class="hover:text-emerald-500"><i data-lucide="instagram" class="w-4 h-4"></i></a>
                            @endif
                            @if(!empty($author->social_links['linkedin']))
                                <a href="{{ $author->social_links['linkedin'] }}" target="_blank" class="hover:text-emerald-500"><i data-lucide="linkedin" class="w-4 h-4"></i></a>
                            @endif
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.authors.edit', $author) }}" class="p-1.5 text-gray-500 hover:text-emerald-600 transition">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.authors.destroy', $author) }}" onsubmit="return confirm('Are you sure you want to delete this author?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-gray-500 hover:text-rose-600 transition">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl p-12 text-center text-gray-500 dark:text-zinc-550">
                    <i data-lucide="users" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                    <p class="font-medium text-base">No authors found</p>
                    <p class="text-xs text-gray-400 mt-1">Get started by creating your first blog author profile.</p>
                </div>
            @forelse
        </div>
    </div>
</x-admin-layout>
