<div class="grid grid-cols-2 gap-2">
    <div>
        <div class="flex">
            <img class="w-14 h-14" src="<?php echo e($arcade_location->thumbnail); ?>">
            <div class="flex-1 ml-4">
                <h3 class="m-0"><?php echo e($arcade->name); ?></h3>
                <address><?php echo e($arcade_location->address); ?> <?php echo e($arcade_location->city); ?>,
                    <?php echo e($arcade_location->state); ?>

                    <?php echo e($arcade_location->zip); ?></address>
            </div>
        </div>
        <div>
            <h5>Games</h5>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-2">Name</th>
                        <th class="px-2">Type</th>
                        <th class="px-2"><?php echo e($arcade->currency); ?></th>
                        <th class="px-2">Pay Min</th>
                        <th class="px-2">Pay Max</th>
                        <th class="px-2">Pay Mean</th>
                        <th class="px-2">Multi</th>
                    </tr>
                </thead>
                <tbody class="text-xs">
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="gameInfoTableRow" data-id="<?php echo e($loc_info['id']); ?>">
                            <td class="gameName px-2"><?php echo e($loc_info['game']->name); ?></td>
                            <td class="px-2"><?php echo e($loc_info['game']->type); ?></td>
                            <td class="px-2"><?php echo e($loc_info['cost']); ?></td>
                            <td class="px-2 text-center"><?php echo e($loc_info['payoutStats']['min']); ?></td>
                            <td class="px-2 text-center"><?php echo e($loc_info['payoutStats']['max']); ?></td>
                            <td class="px-2 text-center"><?php echo e($loc_info['payoutStats']['mean']); ?></td>
                            <td class="gameMultiSwipe px-2">
                                <?php if($loc_info['game']->multi_swipe): ?>
                                    Yes
                                <?php else: ?>
                                    No
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-5">
                <a class="text-xs rounded bg-purple-800 text-white px-3 py-1" href="<?php echo e(route('claimNotebookPayouts')); ?>">Claim Round 1 Notebook Payouts</a>
            </div>
        </div>
    </div>
    <div id="submitPlayRecords" class="hidden">
        <div class="selectedGameName mb-3">Select a Game</div>
        <div class="mb-10">
            Start to Finish Record
            <form method="POST" action="/addPlayLogs">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="arcade_location_game_id" />
                <input type="hidden" name="swipes" value=1 />
                <input type="hidden" id="startToFinishTickets" name="tickets" />
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'startTickets','value' => __('Start Tickets')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'startTickets','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Start Tickets'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'startTickets','class' => 'block mt-1 w-full','type' => 'number','name' => 'startTickets','value' => old('startTickets'),'required' => true]]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'startTickets','class' => 'block mt-1 w-full','type' => 'number','name' => 'startTickets','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('startTickets')),'required' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'endTickets','value' => __('End Tickets')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'endTickets','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('End Tickets'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'endTickets','class' => 'block mt-1 w-full','type' => 'number','name' => 'endTickets','value' => old('endTickets'),'required' => true]]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'endTickets','class' => 'block mt-1 w-full','type' => 'number','name' => 'endTickets','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('endTickets')),'required' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'swipeCounts','value' => __('Swipes')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'swipeCounts','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Swipes'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'swipeCounts','class' => 'block mt-1 w-full','type' => 'number','name' => 'swipeCounts','value' => old('swipeCounts'),'required' => true]]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'swipeCounts','class' => 'block mt-1 w-full','type' => 'number','name' => 'swipeCounts','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('swipeCounts')),'required' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                </div>
                <div id="calcMsgWrap">

                </div>
                <div class="mt-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['id' => 'calcStartToFinish','type' => 'button']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'calcStartToFinish','type' => 'button']); ?>
                        <?php echo e(__('Calculate')); ?>

                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['id' => 'submitStarToFinish','disabled' => true]]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'submitStarToFinish','disabled' => true]); ?>
                        <?php echo e(__('Submit')); ?>

                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>

            </form>
        </div>
        <div>
            Record Play
            <form method="POST" action="/addPlayLogs">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="arcade_location_game_id" />
                
                <div class="mb-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'ticketCount','value' => __('Tickets Won')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'ticketCount','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Tickets Won'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'ticketCount','class' => 'block mt-1 w-full','type' => 'text','name' => 'tickets','value' => old('tickets'),'required' => true]]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'ticketCount','class' => 'block mt-1 w-full','type' => 'text','name' => 'tickets','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('tickets')),'required' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>
                <div>
                    <label for="swipe_count" class="multiSwipeInfo inline-flex items-center">
                        <input id="swipe_count" type="number"
                            class="w-20 rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="swipes" value="1">
                        <span class="ml-2 text-sm text-gray-600"><?php echo e(__('Swipes')); ?></span>
                    </label>
                    <label for="is_jackpot" class="ml-3 inline-flex items-center">
                        <input id="is_jackpot" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="jackpot">
                        <span class="ml-2 text-sm text-gray-600"><?php echo e(__('Jackpot?')); ?></span>
                    </label>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'mt-3']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
                    <?php echo e(__('Submit')); ?>

                 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/projects/arcadia/resources/views/components/round-one-info.blade.php ENDPATH**/ ?>