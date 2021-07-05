<div>
    <!--paginate-->
    @if(!$projects instanceof \Illuminate\Database\Eloquent\Collection)
        <div class="flex flex-grow justify-center m-7">
            {{ $projects->links() }}
        </div>
    @endif
</div>
