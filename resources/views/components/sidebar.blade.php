<div class="bg-white w-64 border-r transition-all duration-300"
 x-data="{ collapsed: false, openBusiness: false }">
    {{-- Header --}}
    <div class="p-4 flex items-center gap-3">
        <div class="w-8 h-8 bg-[#12B6D3] rounded-lg flex items-center justify-center shadow-sm">
            <span class="text-white font-bold text-sm">BM</span>
        </div>
        <template x-if="!collapsed">
            <div>
                <span class="font-bold text-lg text-gray-900">Bimaju</span>
                <p class="text-xs text-gray-500">UMKM Assistant</p>
            </div>
        </template>
    </div>

    {{-- Content --}}
    <div class="px-2 space-y-4">
        {{-- Main --}}
        <div>
            <p class="text-xs font-semibold text-gray-500 px-2" x-show="!collapsed">Main</p>
            <ul class="space-y-1 mt-1">
                <li>
                    <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 px-3 py-3 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                          <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                          <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>
                        <span x-show="!collapsed" class="font-semibold">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/learning') }}" class="flex items-center gap-2 px-3 py-3    rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                          <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                        <span x-show="!collapsed" class="font-semibold">Learning</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Business Tools --}}
        <div>
            <p class="text-xs font-semibold text-gray-500 px-2" x-show="!collapsed">Business Tools</p>
            <button @click="openBusiness = !openBusiness"
                    class="w-full flex items-center justify-between px-2 py-2 rounded-md mt-2 bg-[#12B6D320]">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#12B6D3" class="size-6">
                      <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
                    </svg>
                    <span x-show="!collapsed" class="text-[#12B6D3] font-semibold">Business Tools</span>
                </div>

            </button>
            <ul x-show="openBusiness" class="ml-4 mt-1 space-y-1">
                <li>
                    <a href="{{ url('/finance') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                          <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z" clip-rule="evenodd" />
                        </svg>
                        <span x-show="!collapsed">Finance</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/hpp-calculator') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                          <path fill-rule="evenodd" d="M6.32 1.827a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93ZM7.5 11.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H8.25Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75H8.25Zm1.748-6a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.007Zm-.75 3a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.007Zm1.754-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.008Zm1.748-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-8.25-6A.75.75 0 0 1 8.25 6h7.5a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75v-.75Zm9 9a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-2.25Z" clip-rule="evenodd" />
                        </svg>
                        <span x-show="!collapsed">HPP Calculator</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/recipes') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">
                        <img src="{{asset('assets/images/chef-hat.png')}}" alt="">
                        <span x-show="!collapsed">Recipes</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Community --}}
        <div>
            <p class="text-xs font-semibold text-gray-500 px-2" x-show="!collapsed">Community</p>
            <ul class="space-y-1 mt-1">
                <li>
                    <a href="{{ url('/consultation') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">
                            <i class="fa fa-question" aria-hidden="true"></i>
                            <span x-show="!collapsed">Consultation</span>
                        <span x-show="!collapsed" class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/community') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span x-show="!collapsed">Community</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- Footer --}}
    <div class="mt-auto p-2">
        <ul class="space-y-1">
            <li><a href="{{ url('/profiles') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">👤 <span x-show="!collapsed">Profile</span></a></li>
            <li><a href="{{ url('/settings') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">⚙️ <span x-show="!collapsed">Settings</span></a></li>
            <li><a href="{{ url('/subscription') }}" class="flex items-center gap-2 px-2 py-2 rounded-md hover:bg-gray-100">👑 <span x-show="!collapsed">Subscription</span></a></li>
        </ul>
    </div>
</div>
