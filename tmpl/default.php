<?php
/**
 * @package    tnc_article
 *
 * @version    1.0.0
 * @author     Kannan Naidu Venugopal <kannan.naidu@kannannaidu.my>
 * @copyright  Copyright (c) 2008 - 2021 Kannan Naidu Venugopal. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.kannannaidu.my
 */

defined('_JEXEC') or die;

// Access to module parameters
$button_text = $params->get('button_text');
?>

<?php if(!empty($article)): ?>
<div x-data="{ tnc: false }" @keyup.escape.window="tnc = false;">



   <button type="button" id="toggle_show_tnc" class="my-4 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
           @click="tnc = !tnc;">
     <?php echo $button_text; ?>
   </button>



    <div x-show="tnc" class="fixed inset-0 overflow-hidden z-50" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" :aria-expanded="tnc">
        <div class="absolute inset-0 overflow-hidden">

            <div x-show="tnc" class="absolute inset-0" aria-hidden="true">
                <div x-show="tnc"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="fixed inset-y-0 right-0 pl-10 max-w-full flex">

                    <div class="w-screen max-w-md">
                        <div class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
                            <div class="min-h-0 flex-1 flex flex-col py-6 overflow-y-scroll">
                                <div class="px-4 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
	                                        <?php echo $article->title; ?>
                                        </h2>
                                        <div class="ml-3 h-7 flex items-center">
                                            <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                    @click="tnc = !tnc;">
                                                <span class="sr-only">Close panel</span>
                                                <!-- Heroicon name: outline/x -->
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 relative flex-1 px-4 sm:px-6 text-sm prose">
	                                <?php echo $article->introtext; ?>
	                                <?php echo $article->fulltext; ?>
                                </div>
                            </div>
                            <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                                <button type="button" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                        @click="tnc = !tnc;">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>