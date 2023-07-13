{{--
<!--
    <!-- it is php code  we use was file name listing.php-->
<h1><?php echo $heading; ?> </h1>
<?php foreach($listings as $listing):?>
<h3><?php echo $listing['title']; ?></h3>
<?php endforeach;?>
-->
--}}

<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($listings) == 0)
            <p>There are no listings</p>
        @endif
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    </div>
    <div class="my-8 mt-18 ml-8 mr-8">
        {{ $listings->links() }}
    </div>
</x-layout>
