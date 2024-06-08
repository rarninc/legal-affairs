<div class="flex w-full gap-3 justify-items-stretch">
    <div class="stats shadow w-full bg-blue-400">
        <div class="stat w-full">
            <div class="stat-figure text-secondary">
                <img src="storage/img/briefcase.png" alt="" class="h-14">
            </div>
            <div class="stat-title font-semibold text-black">Ongoing Cases</div>
            <div class="stat-value">{{$case_resolved_count}}</div>
            <div class="stat-desc font-semibold">As of {{$month_and_year}}</div>
            <div class="stat-actions">
                <a href="case_matrix"><button class="btn btn-sm btn-outline">Case Matrix</button> </a>
            </div>
        </div>
    </div>

    <div class="stats shadow w-full bg-success">
        <div class="stat w-full">
            <div class="stat-figure text-secondary">
                <img src="storage/img/docs.png" alt="" class="h-14">
            </div>
            <div class="stat-title font-semibold text-black">Unprocessed Documents</div>
            <div class="stat-value">{{$doc_done_count}}</div>
            <div class="stat-desc font-semibold">As of {{$month_and_year}}</div>
            <div class="stat-actions">
                <button class="btn btn-sm btn-outline">More</button> 
            </div>
        </div>
    </div>

    <div class="stats shadow w-full bg-yellow-400">
        <div class="stat w-full">
            <div class="stat-figure text-secondary">
                <img src="storage/img/cert.png" alt="" class="h-14">
            </div>
            <div class="stat-title font-semibold text-black">CeNoPAC Requests</div>
            <div class="stat-value">{{$cenopac_generated_count}}</div>
            <div class="stat-desc font-semibold">As of {{$month_and_year}}</div>
            <div class="stat-actions">
                <a href="cenopac_record"><button class="btn btn-sm btn-outline">Records</button></a>
                <a href="cenopac"><button class="btn btn-sm">Generate</button></a>
            </div>
        </div>
    </div>
</div>