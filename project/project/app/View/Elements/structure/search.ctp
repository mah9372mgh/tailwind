<div class="relative">
    <span id="btn_search" class="active:bg-violet-700">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path class="dark:fill-white" fill="#1c9af5" fill-rule="evenodd" d="M11 2a9 9 0 1 0 5.618 16.032l3.675 3.675a1 1 0 0 0 1.414-1.414l-3.675-3.675A9 9 0 0 0 11 2m-6 9a6 6 0 1 1 12 0a6 6 0 0 1-12 0" clip-rule="evenodd" />
        </svg>
    </span>
    <form action="/newsstudios/archive/?curp=1">
        <input id="search_input" class="hidden px-1 py-1 absolute top-0 left-11 bg-gray-700 dark:bg-white" name="query" placeholder="جستجو" type="text" value="<?php echo h($_GET['query']); ?>">
        <input type="text" name="queryType" value="lk" hidden="hidden">
        <button type="submit" onclick="document.querySelector('.searchForm').submit();" id="search-submit" style="display:none;"></button>
    </form>
</div>