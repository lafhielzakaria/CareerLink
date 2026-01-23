<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Dashboard - CareerLink</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: #667eea;
            font-size: 28px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ee5a52;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
        }

        .card h2 i {
            color: #667eea;
            font-size: 24px;
        }

        /* Profile Card */
        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #667eea;
        }

        .info-value {
            color: #555;
        }

        .edit-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        .edit-btn:hover {
            background: #5a67d8;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin: 10px 0;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Job Listings */
        .jobs-section {
            grid-column: 1 / -1;
        }

        .job-item {
            background: #f9f9f9;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
        }

        .job-item:hover {
            background: #f0f0f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .job-details h3 {
            color: #333;
            margin-bottom: 5px;
        }

        .job-details p {
            color: #888;
            font-size: 14px;
            margin: 3px 0;
        }

        .job-actions {
            display: flex;
            gap: 10px;
        }

        .apply-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
        }

        .apply-btn:hover {
            background: #5a67d8;
        }

        .view-btn {
            background: #e9ecef;
            color: #333;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
        }

        .view-btn:hover {
            background: #dee2e6;
        }

        /* Applications */
        .applications-section {
            grid-column: 1 / -1;
        }

        .application-item {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-info h3 {
            color: #333;
            margin-bottom: 5px;
        }

        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-accepted {
            background: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 20px;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-briefcase"></i> Candidate Dashboard</h1>
            <div class="user-info">
                <div>
                    <p>Welcome, <strong>John Doe</strong></p>
                    <small>Candidate</small>
                </div>
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <a href="logout" class="logout-btn">Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Card -->
            <div class="card">
                <h2><i class="fas fa-user-circle"></i> My Profile</h2>
                <div class="profile-info">
                    <div class="info-row">
                        <span class="info-label">Full Name:</span>
                        <span class="info-value">John Doe</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value">john@example.com</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone:</span>
                        <span class="info-value">+1 234 567 8900</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Location:</span>
                        <span class="info-value">New York, USA</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Specialization:</span>
                        <span class="info-value">Full Stack Developer</span>
                    </div>
                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit Profile</button>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="card">
                <h2><i class="fas fa-chart-bar"></i> Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-box">
                        <i class="fas fa-file-alt" style="font-size: 28px;"></i>
                        <div class="stat-number">12</div>
                        <div class="stat-label">Applications</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-check-circle" style="font-size: 28px;"></i>
                        <div class="stat-number">3</div>
                        <div class="stat-label">Accepted</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-briefcase" style="font-size: 28px;"></i>
                        <div class="stat-number">28</div>
                        <div class="stat-label">Job Matches</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-star" style="font-size: 28px;"></i>
                        <div class="stat-number">4.5</div>
                        <div class="stat-label">Profile Score</div>
                    </div>
                </div>
            </div>

            <!-- Recent Job Postings -->
            <div class="card jobs-section">
                <h2><i class="fas fa-briefcase"></i> Recommended Jobs</h2>

                <div class="job-item">
                    <div class="job-details">
                        <h3>Senior Full Stack Developer</h3>
                        <p><i class="fas fa-building"></i> Tech Company Inc.</p>
                        <p><i class="fas fa-map-marker-alt"></i> San Francisco, CA</p>
                        <p><i class="fas fa-dollar-sign"></i> $120,000 - $160,000/year</p>
                    </div>
                    <div class="job-actions">
                        <button class="apply-btn"><i class="fas fa-paper-plane"></i> Apply</button>
                        <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                    </div>
                </div>

                <div class="job-item">
                    <div class="job-details">
                        <h3>React Developer</h3>
                        <p><i class="fas fa-building"></i> Digital Solutions LLC</p>
                        <p><i class="fas fa-map-marker-alt"></i> Remote</p>
                        <p><i class="fas fa-dollar-sign"></i> $100,000 - $130,000/year</p>
                    </div>
                    <div class="job-actions">
                        <button class="apply-btn"><i class="fas fa-paper-plane"></i> Apply</button>
                        <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                    </div>
                </div>

                <div class="job-item">
                    <div class="job-details">
                        <h3>Backend Engineer</h3>
                        <p><i class="fas fa-building"></i> Cloud Systems Corp</p>
                        <p><i class="fas fa-map-marker-alt"></i> New York, NY</p>
                        <p><i class="fas fa-dollar-sign"></i> $110,000 - $150,000/year</p>
                    </div>
                    <div class="job-actions">
                        <button class="apply-btn"><i class="fas fa-paper-plane"></i> Apply</button>
                        <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                    </div>
                </div>
            </div>



            <!-- My Applications -->
            <div class="card applications-section">
                <h2><i class="fas fa-list-check"></i> My Applications</h2>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Frontend Developer - ABC Tech</h3>
                        <p><small>Applied on: January 15, 2026</small></p>
                    </div>
                    <span class="status-badge status-accepted"><i class="fas fa-check"></i> Accepted</span>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Full Stack Developer - XYZ Company</h3>
                        <p><small>Applied on: January 10, 2026</small></p>
                    </div>
                    <span class="status-badge status-pending"><i class="fas fa-clock"></i> Pending</span>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Junior Developer - Code Masters</h3>
                        <p><small>Applied on: January 5, 2026</small></p>
                    </div>
                    <span class="status-badge status-rejected"><i class="fas fa-times"></i> Rejected</span>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/index.js"></script>
</body>

</html>