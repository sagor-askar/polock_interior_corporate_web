<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-globe"></i><span>Info Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>About Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.milestones.index') }}">
                        <i class="bi bi-circle"></i><span>Milestones Setup</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.team.index') }}">
                        <i class="bi bi-circle"></i><span>Team Members</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Concerns Setup</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.clients.index') }}">
                        <i class="bi bi-circle"></i><span>Clients Setup</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Certificates Setup</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#projects-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-house-check-fill"></i><span>Project Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="projects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.project-types.index') }}">
                        <i class="bi bi-circle"></i><span>Project Type</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}">
                        <i class="bi bi-circle"></i><span>Projects</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.testimonials.index') }}">
                <i class="bi bi-chat-left-quote"></i>
                <span>Testimonials</span>
            </a>
        </li>

        <hr>
    </ul>

</aside>
