@extends('layouts.master')

@section('content')
<div class="content flex-row-fluid" id="kt_content">
	<!--begin::Row-->
	<div class="row g-6 g-xl-9">
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Fitnes App</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Mar 10, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
						<div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
							<img alt="Pic" src="assets/media/avatars/300-6.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rudy Stone">
							<img alt="Pic" src="assets/media/avatars/300-1.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
							<span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/disqus.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light fw-bolder me-auto px-4 py-3">Pending</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Leaf CRM</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">May 10, 2021</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$36,400.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 30% completed">
						<div class="bg-info rounded h-4px" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
							<span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Brian Cox">
							<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/figma-1.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Atica Banking</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Mar 14, 2021</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$605,100.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 100% completed">
						<div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mad Macy">
							<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Cris Willson">
							<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mike Garcie">
							<span class="symbol-label bg-info text-inverse-info fw-bolder">M</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/sentry-3.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light fw-bolder me-auto px-4 py-3">Pending</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Finance Dispatch</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Dec 20, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 60% completed">
						<div class="bg-info rounded h-4px" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Nich Warden">
							<span class="symbol-label bg-warning text-inverse-warning fw-bolder">N</span>
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rob Otto">
							<span class="symbol-label bg-success text-inverse-success fw-bolder">R</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/xing-icon.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">9 Degree</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Jun 20, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 40% completed">
						<div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Francis Mitcham">
							<img alt="Pic" src="assets/media/avatars/300-20.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michelle Swanston">
							<img alt="Pic" src="assets/media/avatars/300-7.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
							<span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/tvit.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">GoPro App</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Dec 20, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 70% completed">
						<div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
							<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Robin Watterman">
							<span class="symbol-label bg-success text-inverse-success fw-bolder">R</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/aven.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Buldozer CRM</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">May 05, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 70% completed">
						<div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
							<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="John Mixin">
							<img alt="Pic" src="assets/media/avatars/300-14.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
							<span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/treva.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-danger fw-bolder me-auto px-4 py-3">Overdue</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Aviasales App</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Jul 25, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 10% completed">
						<div class="bg-danger rounded h-4px" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
							<span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Brian Cox">
							<img alt="Pic" src="assets/media/avatars/300-5.jpg" />
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-md-6 col-xl-4">
			<!--begin::Card-->
			<a href="../../demo16/dist/apps/projects/project.html" class="card border-hover-primary">
				<!--begin::Card header-->
				<div class="card-header border-0 pt-9">
					<!--begin::Card Title-->
					<div class="card-title m-0">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px w-50px bg-light">
							<img src="assets/media/svg/brand-logos/kanba.svg" alt="image" class="p-3" />
						</div>
						<!--end::Avatar-->
					</div>
					<!--end::Car Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end:: Card header-->
				<!--begin:: Card body-->
				<div class="card-body p-9">
					<!--begin::Name-->
					<div class="fs-3 fw-bolder text-dark">Oppo CRM</div>
					<!--end::Name-->
					<!--begin::Description-->
					<p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
					<!--end::Description-->
					<!--begin::Info-->
					<div class="d-flex flex-wrap mb-5">
						<!--begin::Due-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">Apr 15, 2022</div>
							<div class="fw-bold text-gray-400">Due Date</div>
						</div>
						<!--end::Due-->
						<!--begin::Budget-->
						<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
							<div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
							<div class="fw-bold text-gray-400">Budget</div>
						</div>
						<!--end::Budget-->
					</div>
					<!--end::Info-->
					<!--begin::Progress-->
					<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 100% completed">
						<div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!--end::Progress-->
					<!--begin::Users-->
					<div class="symbol-group symbol-hover">
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Nick Macy">
							<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Sean Paul">
							<img alt="Pic" src="assets/media/avatars/300-9.jpg" />
						</div>
						<!--begin::User-->
						<!--begin::User-->
						<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mike Collin">
							<span class="symbol-label bg-info text-inverse-info fw-bolder">M</span>
						</div>
						<!--begin::User-->
					</div>
					<!--end::Users-->
				</div>
				<!--end:: Card body-->
			</a>
			<!--end::Card-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Pagination-->
	<div class="d-flex flex-stack flex-wrap pt-10">
		<div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
		<!--begin::Pages-->
		<ul class="pagination">
			<li class="page-item previous">
				<a href="#" class="page-link">
					<i class="previous"></i>
				</a>
			</li>
			<li class="page-item active">
				<a href="#" class="page-link">1</a>
			</li>
			<li class="page-item">
				<a href="#" class="page-link">2</a>
			</li>
			<li class="page-item">
				<a href="#" class="page-link">3</a>
			</li>
			<li class="page-item">
				<a href="#" class="page-link">4</a>
			</li>
			<li class="page-item">
				<a href="#" class="page-link">5</a>
			</li>
			<li class="page-item">
				<a href="#" class="page-link">6</a>
			</li>
			<li class="page-item next">
				<a href="#" class="page-link">
					<i class="next"></i>
				</a>
			</li>
		</ul>
		<!--end::Pages-->
	</div>
	<!--end::Pagination-->
</div>
@endsection

