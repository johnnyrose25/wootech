<?php

    $fields = get_fields();
   

    if ($fields['orientation'] == 'left') :
?>
<div class="relative flex flex-col pt-14 pb-7 lg:py-0 lg:flex-col">
    <div class="inset-y-0 top-0 left-0 w-full mb-8 lg:mb-0 lg:w-1/2 lg:pr-4 lg:absolute" data-aos="fade-up" data-aos-duration="1000">
        <img class="object-cover w-full h-full" src="<?php echo $fields['image']; ?>" width="960" height="400" alt="<?php echo $fields['title']; ?>">
    </div>
    <div class="container flex flex-wrap justify-end">
        <div class="lg:w-1/2 lg:pl-16 lg:pr-3 lg:py-12" data-aos="fade-up" data-aos-duration="500">
            <div class="flex flex-wrap items-baseline text-blue-100">
                <h2><?php echo $fields['title']; ?></h2>
                <?php echo svgInline::inline($fields['icon']); ?>
            </div>
            <h3 class="text-blue-200 text-[22px] mb-7"><?php echo $fields['tagline']; ?></h3>
            <p class="text-lg font-light mb-8"><?php echo $fields['description']; ?></p>
            <div class="py-2 mb-4">
                <a  class="linline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-white hover:text-white focus:text-white bg-blue-100 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="<?php echo $fields['learn_more_url']; ?>">Learn more</a>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<div class="relative flex flex-col pt-14 pb-14 lg:py-0 lg:flex-col bg-white">
    <div class="inset-y-0 top-0 right-0 w-full mb-8 lg:mb-0 lg:w-1/2 lg:pl-4 lg:absolute" data-aos="fade-up" data-aos-duration="1000">
        <img class="object-cover object-left-top w-full h-full" src="<?php echo $fields['image']; ?>" width="960" height="400" alt="<?php echo $fields['title']; ?>">
    </div>
    <div class="container flex flex-wrap justify-start">
        <div class="lg:w-1/2 lg:pr-8 lg:py-12" data-aos="fade-up" data-aos-duration="500">
            <div class="flex flex-wrap items-baseline text-blue-100">
                <h2><?php echo $fields['title']; ?></h2>
                <?php echo svgInline::inline($fields['icon']); ?>
            </div>
            <h3 class="text-blue-200 text-[22px] mb-7"><?php echo $fields['tagline']; ?></h3>
            <p class="text-lg font-light mb-8"><?php echo $fields['description']; ?></p>
            <div class="py-2 mb-4">
                <a  class="linline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-white hover:text-white focus:text-white bg-blue-100 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="<?php echo $fields['learn_more_url']; ?>">Learn more</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>