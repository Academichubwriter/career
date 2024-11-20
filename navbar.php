<?php
// Assume $userType is set based on the user's role (e.g., 'jobseeker' or 'employer')
$userType = 'jobseeker'; // For example, change this value based on your user's role

function generateNavigation($userType) {
    $navigation = '<ul>';

    if ($userType === 'jobseeker') {
        $navigation .= '<li><a href="#">For Job Seekers</a>';
        $navigation .= '<ul class="submenu">';
        $navigation .= '<li><a href="#">Upload Resume</a></li>';
        $navigation .= '<li><a href="#">Set Job Alerts</a></li>';
        $navigation .= '<li><a href="#">Career Resources</a></li>';
        $navigation .= '</ul></li>';
    }

    if ($userType === 'employer') {
        $navigation .= '<li><a href="#">For Employers</a>';
        $navigation .= '<ul class="submenu">';
        $navigation .= '<li><a href="#">Post a Job</a></li>';
        $navigation .= '<li><a href="#">Manage Job Postings</a></li>';
        $navigation .= '<li><a href="#">Candidate Applications</a></li>';
        $navigation .= '</ul></li>';
    }

    $navigation .= '</ul>';

    return $navigation;
}

echo generateNavigation($userType);
?>
