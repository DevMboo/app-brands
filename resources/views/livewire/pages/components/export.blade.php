<div class="relative " x-data="{ expanded: false }">
    <a href="#" @click="expanded = !expanded"
        class="flex items-center gap-2 bg-transparent hover:bg-slate-200 px-3 py-2 rounded-lg">
        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-download">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
            <polyline points="7 10 12 15 17 10" />
            <line x1="12" x2="12" y1="15" y2="3" />
        </svg>
        <p class="text-xs text-neutral-700">
            Exportar
        </p>
    </a>

    <!-- Dropdown menu -->
    <div x-show="expanded" @click.outside="expanded = false"
        class="absolute top-full right-0 z-40 mt-2 w-96 bg-white border border-gray-200 rounded-xl shadow-lg p-2">
        <ul class="text-gray-700 grid grid-cols-3 gap-3">
            <li class="col-span-3">
                <input type="search" wire:model.live="search" class="bg-gray-50 border border-gray-300 text-gray-900 mt-2 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </li>
            <li class="col-span-3">
                <div class="text-gray-700 flex items-center gap-3">
                    <div class="flex-shrink-0 flex-1 w-[46%]">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input type="text" wire:model.live="date_ini" x-mask="99/99/9999" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date ini">
                        </div>
                    </div>
                    <div class="w-[8%]">
                        <p class="ms-1">
                            Até
                        </p>
                    </div>
                    <div class="flex-shrink-0 flex-1 w-[46%]">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input type="text" wire:model.live="date_end" x-mask="99/99/9999" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date end">
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-span-1">
                <button
                    wire:click="export('csv')"
                    class="bg-green-950 hover:bg-green-800 text-white flex items-center justify-center gap-2 w-full h-full rounded-xl py-2">
                    <svg class="size-4" height="200px" width="200px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path style="fill:#ECEDEF;"
                                d="M100.641,0c-14.139,0-25.6,11.461-25.6,25.6v460.8c0,14.139,11.461,25.6,25.6,25.6h375.467 c14.139,0,25.6-11.461,25.6-25.6V85.333L416.375,0H100.641z">
                            </path>
                            <path style="fill:#D9DCDF;"
                                d="M441.975,85.333h59.733L416.375,0v59.733C416.375,73.872,427.836,85.333,441.975,85.333z">
                            </path>
                            <path style="fill:#C6CACF;"
                                d="M399.308,42.667H75.041v153.6h324.267c4.713,0,8.533-3.821,8.533-8.533V51.2 C407.841,46.487,404.02,42.667,399.308,42.667z">
                            </path>
                            <path style="fill:#C4DF64;"
                                d="M382.241,179.2H18.843c-7.602,0-11.41-9.191-6.034-14.567L75.041,102.4L12.809,40.167 C7.433,34.791,11.241,25.6,18.843,25.6h363.398c4.713,0,8.533,3.821,8.533,8.533v136.533 C390.775,175.379,386.954,179.2,382.241,179.2z">
                            </path>
                            <path style="fill:#C6CACF;"
                                d="M399.308,460.8H177.441c-4.713,0-8.533-3.821-8.533-8.533V230.4c0-4.713,3.821-8.533,8.533-8.533 h221.867c4.713,0,8.533,3.821,8.533,8.533v221.867C407.841,456.979,404.02,460.8,399.308,460.8z">
                            </path>
                            <path style="fill:#B3B9BF;"
                                d="M185.975,443.733V221.867h-8.533c-4.713,0-8.533,3.821-8.533,8.533v221.867 c0,4.713,3.821,8.533,8.533,8.533h221.867c4.713,0,8.533-3.821,8.533-8.533v-8.533H185.975z">
                            </path>
                            <g>
                                <path style="fill:#FFFFFF;"
                                    d="M185.975,145.067h-25.6c-4.713,0-8.533-3.821-8.533-8.533v-51.2c0-4.713,3.821-8.533,8.533-8.533 h25.6c4.713,0,8.533,3.821,8.533,8.533s-3.821,8.533-8.533,8.533h-17.067V128h17.067c4.713,0,8.533,3.821,8.533,8.533 S190.687,145.067,185.975,145.067z">
                                </path>
                                <path style="fill:#FFFFFF;"
                                    d="M237.175,145.067h-25.6c-4.713,0-8.533-3.821-8.533-8.533s3.821-8.533,8.533-8.533h17.067v-8.533 h-17.067c-4.713,0-8.533-3.821-8.533-8.533v-25.6c0-4.713,3.821-8.533,8.533-8.533h25.6c4.713,0,8.533,3.821,8.533,8.533 s-3.821,8.533-8.533,8.533h-17.067v8.533h17.067c4.713,0,8.533,3.821,8.533,8.533v25.6 C245.708,141.246,241.887,145.067,237.175,145.067z">
                                </path>
                                <path style="fill:#FFFFFF;"
                                    d="M279.841,145.067c-3.673,0-6.934-2.351-8.096-5.835l-17.067-51.2 c-1.489-4.47,0.926-9.303,5.397-10.794c4.477-1.492,9.303,0.926,10.795,5.397l8.971,26.913l8.971-26.913 c1.491-4.47,6.322-6.886,10.795-5.397c4.47,1.49,6.886,6.323,5.397,10.794l-17.067,51.2 C286.776,142.716,283.515,145.067,279.841,145.067z">
                                </path>
                            </g>
                            <g>
                                <path style="fill:#8E959F;"
                                    d="M237.175,273.067h-34.133c-4.713,0-8.533-3.821-8.533-8.533c0-4.713,3.821-8.533,8.533-8.533h34.133 c4.713,0,8.533,3.821,8.533,8.533C245.708,269.246,241.887,273.067,237.175,273.067z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M373.708,273.067h-102.4c-4.713,0-8.533-3.821-8.533-8.533c0-4.713,3.821-8.533,8.533-8.533h102.4 c4.713,0,8.533,3.821,8.533,8.533C382.241,269.246,378.42,273.067,373.708,273.067z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M237.175,324.267h-34.133c-4.713,0-8.533-3.821-8.533-8.533c0-4.713,3.821-8.533,8.533-8.533h34.133 c4.713,0,8.533,3.821,8.533,8.533C245.708,320.446,241.887,324.267,237.175,324.267z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M373.708,324.267h-102.4c-4.713,0-8.533-3.821-8.533-8.533c0-4.713,3.821-8.533,8.533-8.533h102.4 c4.713,0,8.533,3.821,8.533,8.533C382.241,320.446,378.42,324.267,373.708,324.267z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M237.175,375.467h-34.133c-4.713,0-8.533-3.821-8.533-8.533s3.821-8.533,8.533-8.533h34.133 c4.713,0,8.533,3.821,8.533,8.533S241.887,375.467,237.175,375.467z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M296.908,375.467h-25.6c-4.713,0-8.533-3.821-8.533-8.533s3.821-8.533,8.533-8.533h25.6 c4.713,0,8.533,3.821,8.533,8.533S301.62,375.467,296.908,375.467z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M237.175,426.667h-34.133c-4.713,0-8.533-3.821-8.533-8.533s3.821-8.533,8.533-8.533h34.133 c4.713,0,8.533,3.821,8.533,8.533S241.887,426.667,237.175,426.667z">
                                </path>
                                <path style="fill:#8E959F;"
                                    d="M296.908,426.667h-25.6c-4.713,0-8.533-3.821-8.533-8.533s3.821-8.533,8.533-8.533h25.6 c4.713,0,8.533,3.821,8.533,8.533S301.62,426.667,296.908,426.667z">
                                </path>
                            </g>
                            <path style="fill:#529E44;"
                                d="M363.483,392.533l16.781-20.137c3.018-3.621,2.528-9.002-1.092-12.019 c-3.619-3.017-9.001-2.529-12.018,1.092l-14.778,17.733l-14.778-17.733c-3.017-3.619-8.398-4.109-12.018-1.092 c-3.621,3.018-4.111,8.398-1.092,12.019l16.78,20.137l-16.781,20.137c-2.754,3.305-2.574,8.309,0.425,11.399 c3.484,3.59,9.485,3.368,12.686-0.474l14.778-17.733l14.778,17.733c3.201,3.842,9.202,4.063,12.686,0.474 c2.998-3.09,3.179-8.095,0.425-11.399L363.483,392.533z">
                            </path>
                        </g>
                    </svg>
                    CSV
                </button>
            </li>
            <li class="col-span-1">
                <button
                    wire:click="export('xlsx')"
                    class="bg-green-700 hover:bg-green-800 text-white flex items-center justify-center gap-2 w-full h-full rounded-xl py-2">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" fill="#FFF"
                        stroke-miterlimit="10" stroke-width="2">
                        <path stroke="#979593"
                            d="M67.1716,7H27c-1.1046,0-2,0.8954-2,2v78 c0,1.1046,0.8954,2,2,2h58c1.1046,0,2-0.8954,2-2V26.8284c0-0.5304-0.2107-1.0391-0.5858-1.4142L68.5858,7.5858 C68.2107,7.2107,67.702,7,67.1716,7z" />
                        <path fill="none" stroke="#979593" d="M67,7v18c0,1.1046,0.8954,2,2,2h18" />
                        <path fill="#C8C6C4"
                            d="M51 61H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 60.5523 51.5523 61 51 61zM51 55H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 54.5523 51.5523 55 51 55zM51 49H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 48.5523 51.5523 49 51 49zM51 43H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 42.5523 51.5523 43 51 43zM51 67H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 66.5523 51.5523 67 51 67zM79 61H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 60.5523 79.5523 61 79 61zM79 67H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 66.5523 79.5523 67 79 67zM79 55H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 54.5523 79.5523 55 79 55zM79 49H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 48.5523 79.5523 49 79 49zM79 43H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 42.5523 79.5523 43 79 43zM65 61H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 60.5523 65.5523 61 65 61zM65 67H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 66.5523 65.5523 67 65 67zM65 55H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 54.5523 65.5523 55 65 55zM65 49H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 48.5523 65.5523 49 65 49zM65 43H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 42.5523 65.5523 43 65 43z" />
                        <path fill="#107C41"
                            d="M12,74h32c2.2091,0,4-1.7909,4-4V38c0-2.2091-1.7909-4-4-4H12c-2.2091,0-4,1.7909-4,4v32 C8,72.2091,9.7909,74,12,74z" />
                        <path
                            d="M16.9492,66l7.8848-12.0337L17.6123,42h5.8115l3.9424,7.6486c0.3623,0.7252,0.6113,1.2668,0.7471,1.6236 h0.0508c0.2617-0.58,0.5332-1.1436,0.8164-1.69L33.1943,42h5.335l-7.4082,11.9L38.7168,66H33.041l-4.5537-8.4017 c-0.1924-0.3116-0.374-0.6858-0.5439-1.1215H27.876c-0.0791,0.2684-0.2549,0.631-0.5264,1.0878L22.6592,66H16.9492z" />
                    </svg>
                    XLSX
                </button>
            </li>
            <li class="col-span-1">
                <button
                    wire:click="export('pdf')"
                    class="bg-red-700 hover:bg-red-800 text-white flex items-center justify-center gap-2 w-full h-full rounded-xl py-2">
                    <svg class="size-4" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 303.188 303.188" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <polygon style="fill:#E8E8E8;"
                                    points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 ">
                                </polygon>
                                <path style="fill:#FB3449;"
                                    d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936 c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202 c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251 c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594 c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603 c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02 c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024 c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387 c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205 c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119 c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57 C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041 c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065 c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918 c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985 c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993 c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883 c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265 c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197 c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542 c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275 c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z">
                                </path>
                                <polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 ">
                                </polygon>
                                <g>
                                    <path style="fill:#A4A9AD;"
                                        d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643 v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857 h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z">
                                    </path>
                                    <path style="fill:#A4A9AD;"
                                        d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979 h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324 c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43 C160.841,257.523,161.76,254.028,161.76,249.324z">
                                    </path>
                                    <path style="fill:#A4A9AD;"
                                        d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374 L196.579,273.871L196.579,273.871z">
                                    </path>
                                </g>
                                <polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 ">
                                </polygon>
                            </g>
                        </g>
                    </svg>
                    PDF
                </button>
            </li>
        </ul>
    </div>
</div>
