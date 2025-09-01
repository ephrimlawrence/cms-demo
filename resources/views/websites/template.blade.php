<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />

    <title>{{ $website->name }}</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden"
        style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f5] px-10 py-3">
                <div class="flex items-center gap-4 text-[#111418]">
                    <div class="size-4">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em]">{{ $website->name }}
                    </h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#111418] text-sm font-medium leading-normal" href="#features">Features</a>
                        <a class="text-[#111418] text-sm font-medium leading-normal" href="#pricing">Pricing</a>
                        <a class="text-[#111418] text-sm font-medium leading-normal"
                            href="#testimonials">Testimonials</a>
                    </div>
                    <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#0d78f2] text-white text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Get Started</span>
                    </button>
                </div>
            </header>
            <div class="px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="@container">
                        <div class="@[480px]:p-4">
                            <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-lg items-center justify-center p-4"
                                style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB26fBaopNYEr2eUIbAgV3Sz05-aJAtAvpgOuxNHjiZxNarz24XgTaoDnXorE5GcNjSuXrWA7gVouXTA725fiRPm_9hXGRU-0Hj6ulldMS9AeB8DNkgUJEVavaZxNSULseo8OjPnn7tSE0ekY3Y8X8p5HLsO5_qWwtO5vphkWl-23KxdXumQGlsAXmvU0MBrKzOi8tToUkbzYDTN68wFTqpR6Kq3JIu5z54q1sWhu8RyUulxU0pjE-kq29K9X1BRLsXN_Re2g2mGXU");'>
                                <div class="flex flex-col gap-2 text-center">
                                    <h1
                                        class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        {{ $config->hero->title }}
                                    </h1>
                                    <h2
                                        class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                        {{ $config->hero->subtitle }}
                                    </h2>
                                </div>
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#0d78f2] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
                                    <span class="truncate">Get Started</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-10 px-4 py-10 @container">
                        <div class="flex flex-col gap-4">
                            <h1
                                class="text-[#111418] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                                Key Features
                            </h1>
                            <p class="text-[#111418] text-base font-normal leading-normal max-w-[720px]">
                                {{ $config->features->summary }}
                            </p>
                        </div>
                        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-0">
                            @foreach ($config->features->items as $item)
                                <div class="flex flex-1 gap-3 rounded-lg border border-[#dbe0e6] bg-white p-4 flex-col">

                                    <div class="flex flex-col gap-1">
                                        <h2 class="text-[#111418] text-base font-bold leading-tight">{{ $item->title }}
                                        </h2>
                                        <p class="text-[#60748a] text-sm font-normal leading-normal">
                                            {{ $item->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                        Pricing Plans</h2>
                    <div class="grid grid-cols-[repeat(auto-fit,minmax(228px,1fr))] gap-2.5 px-4 py-3 @3xl:grid-cols-4">
                        @foreach ($config->pricing_plans as $price)
                            <div
                                class="flex flex-1 flex-col gap-4 rounded-lg border border-solid border-[#dbe0e6] bg-white p-6">
                                <div class="flex flex-col gap-1">
                                    <h1 class="text-[#111418] text-base font-bold leading-tight">{{ $price->title }}
                                    </h1>
                                    <p class="flex items-baseline gap-1 text-[#111418]">
                                        <span
                                            class="text-[#111418] text-4xl font-black leading-tight tracking-[-0.033em]">${{ $price->price }}</span>
                                        <span class="text-[#111418] text-base font-bold leading-tight">/month</span>
                                    </p>
                                </div>
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f5] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em]">
                                    <span class="truncate">Choose {{ $price->title }}</span>
                                </button>
                                <div class="flex flex-col gap-2">
                                    @foreach ($price->features as $ft)
                                        <div class="text-[13px] font-normal leading-normal flex gap-3 text-[#111418]">
                                            <div class="text-[#111418]" data-icon="Check" data-size="20px"
                                                data-weight="regular">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                    fill="currentColor" viewBox="0 0 256 256">
                                                    <path
                                                        d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            {{ $ft }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                        Customer Testimonials</h2>
                    <div
                        class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
                        <div class="flex items-stretch p-4 gap-3">
                            @foreach ($config->testimonials as $tts)
                                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-40">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg flex flex-col"
                                        style='background-image: url("{{ $tts->image }}");'>
                                    </div>
                                    <div>
                                        <p class="text-[#111418] text-base font-medium leading-normal">
                                            {{ $tts->text }}</p>
                                        <p class="text-[#60748a] text-sm font-normal leading-normal">
                                            {{ $tts->author }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="@container">
                        <div
                            class="flex flex-col justify-end gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20">
                            <div class="flex flex-col gap-2 text-center">
                                <h1
                                    class="text-[#111418] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                                    Stay Updated
                                </h1>
                                <p class="text-[#111418] text-base font-normal leading-normal max-w-[720px">Sign up for
                                    our newsletter to receive the latest updates and news about {{ $website->name }}.
                                </p>
                            </div>
                            <div class="flex flex-1 justify-center">
                                <label class="flex flex-col min-w-40 h-14 max-w-[480px] flex-1 @[480px]:h-16">
                                    <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                        <input placeholder="Enter your email"
                                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f5] focus:border-none h-full placeholder:text-[#60748a] px-4 rounded-r-none border-r-0 pr-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                            value="" />
                                        <div
                                            class="flex items-center justify-center rounded-r-lg border-l-0 border-none bg-[#f0f2f5] pr-2">
                                            <button
                                                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#0d78f2] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
                                                <span class="truncate">Subscribe</span>
                                            </button>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="flex justify-center">
                <div class="flex max-w-[960px] flex-1 flex-col">
                    <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
                        <div
                            class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                            <a class="text-[#60748a] text-base font-normal leading-normal min-w-40"
                                href="#">Privacy
                                Policy</a>
                            <a class="text-[#60748a] text-base font-normal leading-normal min-w-40"
                                href="#">Terms
                                of Service</a>
                            <a class="text-[#60748a] text-base font-normal leading-normal min-w-40"
                                href="#">Contact
                                Us</a>
                        </div>
                        <p class="text-[#60748a] text-base font-normal leading-normal">© 2024 {{ $website->name }}.
                            All rights
                            reserved.</p>
                    </footer>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
