<x-admin-layout>
    <x-slot name="title">Manage Admin Users & Roles</x-slot>

    <div class="space-y-6" x-data="{ openCreateModal: false, editUser: null, openEditModal: false }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Users & Access Control</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Manage internal administrator team accounts and configure role permissions.</p>
            </div>
            <button @click="openCreateModal = true" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add User Account</span>
            </button>
        </div>

        <!-- Users Table -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">User Name</th>
                            <th class="px-6 py-4">Email Address</th>
                            <th class="px-6 py-4">Spatie Role</th>
                            <th class="px-6 py-4">Permissions Summary</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4 font-mono text-xs text-gray-500 dark:text-zinc-400">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @foreach($user->roles as $role)
                                        <span class="text-xs bg-emerald-50 dark:bg-emerald-950/20 text-emerald-700 dark:text-emerald-400 px-2.5 py-1 rounded font-bold border border-emerald-100 dark:border-emerald-900/30">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-400 max-w-xs truncate">
                                    {{ implode(', ', $user->getPermissionNames()->toArray()) ?: 'No direct permissions' }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <button @click="editUser = {{ json_encode($user) }}; editUser.role = '{{ $user->roles->first()->name ?? '' }}'; openEditModal = true"
                                                class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition" title="Edit Account">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        @if($user->id !== auth()->id())
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user account?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 dark:text-zinc-400 dark:hover:text-rose-400 transition" title="Delete Account">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-zinc-800">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- Create User Modal -->
        <div x-show="openCreateModal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/60" style="display: none;">
            <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl max-w-md w-full shadow-2xl overflow-hidden p-6 lg:p-8" @click.away="openCreateModal = false">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Create Admin Account</h3>
                    <button @click="openCreateModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-zinc-300"><i data-lucide="x" class="w-5 h-5"></i></button>
                </div>

                <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
                    @csrf
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Full Name</label>
                        <input type="text" name="name" required placeholder="e.g. Kuldeep Sharma" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Email Address</label>
                        <input type="email" name="email" required placeholder="email@kksb.com" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Password</label>
                            <input type="password" name="password" required class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Confirm Password</label>
                            <input type="password" name="password_confirmation" required class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Select Role</label>
                        <select name="role" required class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                        <button type="button" @click="openCreateModal = false" class="px-4 py-2 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-xs font-medium text-gray-700 dark:text-zinc-300">Cancel</button>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs px-5 py-2.5 rounded-xl transition shadow-sm">Save Account</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div x-show="openEditModal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/60" style="display: none;">
            <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl max-w-md w-full shadow-2xl overflow-hidden p-6 lg:p-8" @click.away="openEditModal = false">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Modify User Account</h3>
                    <button @click="openEditModal = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-zinc-300"><i data-lucide="x" class="w-5 h-5"></i></button>
                </div>

                <form method="POST" :action="editUser ? '/admin/users/' + editUser.id : '#'" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Full Name</label>
                        <input type="text" name="name" required :value="editUser ? editUser.name : ''" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Email Address</label>
                        <input type="email" name="email" required :value="editUser ? editUser.email : ''" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">New Password</label>
                            <input type="password" name="password" placeholder="Leave blank to keep" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Leave blank to keep" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-gray-500 dark:text-zinc-400 uppercase">Select Role</label>
                        <select name="role" required class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" :selected="editUser && editUser.role === '{{ $role->name }}'">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                        <button type="button" @click="openEditModal = false" class="px-4 py-2 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-xs font-medium text-gray-700 dark:text-zinc-300">Cancel</button>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs px-5 py-2.5 rounded-xl transition shadow-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>
