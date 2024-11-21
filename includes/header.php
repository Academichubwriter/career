<?php
if (!isset($_SESSION)) {
    session_start();
}

// Determine if user is logged in and their type
$isLoggedIn = isset($_SESSION['user_id']);
$userType = $isLoggedIn ? $_SESSION['user_type'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Career Link</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="<?php echo $isLoggedIn ? ($userType == 'employer' ? 'employer_dashboard.php' : 'jobseeker_dashboard.php') : 'index.php'; ?>" 
                           class="text-2xl font-bold text-blue-600">
                            Career<span class="text-gray-800">Link</span>
                        </a>
                    </div>

                    <?php if ($isLoggedIn): ?>
                        <?php if ($userType == 'employer'): ?>
                            <!-- Employer Navigation -->
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <a href="employer_dashboard.php" 
                                   class="<?php echo $currentPage == 'dashboard' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Dashboard
                                </a>
                                <a href="post_job.php" 
                                   class="<?php echo $currentPage == 'post_job' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Post a Job
                                </a>
                                <a href="manage_jobs.php" 
                                   class="<?php echo $currentPage == 'manage_jobs' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Manage Jobs
                                </a>
                                <a href="employer_reports.php" 
                                   class="<?php echo $currentPage == 'employer_reports' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Reports
                                </a>
                            </div>
                        <?php else: ?>
                            <!-- Job Seeker Navigation -->
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <a href="jobseeker_dashboard.php" 
                                   class="<?php echo $currentPage == 'dashboard' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Dashboard
                                </a>
                                <a href="search_jobs.php" 
                                   class="<?php echo $currentPage == 'search_jobs' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Find Jobs
                                </a>
                                <a href="saved_jobs.php" 
                                   class="<?php echo $currentPage == 'saved_jobs' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Saved Jobs
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="flex items-center">
                    <?php if ($isLoggedIn): ?>
                        <div class="flex-shrink-0 relative ml-4 dropdown">
                            <button class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu-button">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <span class="text-blue-700 font-medium text-sm">
                                        <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                                    </span>
                                </div>
                            </button>
                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 dropdown-menu" role="menu">
                                <?php if ($userType == 'employer'): ?>
                                    <a href="employer_profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Company Profile</a>
                                    <a href="company_settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <?php else: ?>
                                    <button onclick="showProfileModal()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</button>
                                    <a href="upload_resume.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Upload Resume</a>
                                <?php endif; ?>
                                <a href="logout.php" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100">Sign out</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="register.php" class="ml-4 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Sign up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Dropdown toggle
        document.getElementById('user-menu-button')?.addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelector('.dropdown-menu')?.classList.add('hidden');
            }
        });
    </script>
</body>
</html> 