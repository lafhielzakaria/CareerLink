<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard - CareerLink</title>
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

        /* Company Info Card */
        .company-info {
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

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .post-job-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
        }

        .post-job-btn:hover {
            background: #5a67d8;
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

        .edit-job-btn,
        .delete-job-btn,
        .view-applications-btn {
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .edit-job-btn {
            background: #667eea;
            color: white;
        }

        .edit-job-btn:hover {
            background: #5a67d8;
        }

        .view-applications-btn {
            background: #4CAF50;
            color: white;
        }

        .view-applications-btn:hover {
            background: #45a049;
        }

        .delete-job-btn {
            background: #ff6b6b;
            color: white;
        }

        .delete-job-btn:hover {
            background: #ee5a52;
        }

        /* Applications */
        .applications-section {
            grid-column: 1 / -1;
        }

        .filter-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: #e9ecef;
            border: 1px solid #dee2e6;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 13px;
        }

        .filter-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .filter-btn:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
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

        .app-info p {
            color: #888;
            font-size: 13px;
        }

        .app-actions {
            display: flex;
            gap: 10px;
        }

        .review-btn,
        .reject-btn,
        .accept-btn {
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .review-btn {
            background: #667eea;
            color: white;
        }

        .review-btn:hover {
            background: #5a67d8;
        }

        .accept-btn {
            background: #4CAF50;
            color: white;
        }

        .accept-btn:hover {
            background: #45a049;
        }

        .reject-btn {
            background: #ff6b6b;
            color: white;
        }

        .reject-btn:hover {
            background: #ee5a52;
        }

        /* Status Badge */
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-new {
            background: #cfe2ff;
            color: #084298;
        }

        .status-reviewed {
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
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-building"></i> Recruiter Dashboard</h1>
            <div class="user-info">
                <div>
                    <p>Welcome, <strong>Tech Company Inc.</strong></p>
                    <small>Recruiter</small>
                </div>
                <div class="user-avatar">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="logout" class="logout-btn">Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Company Info Card -->
            <div class="card">
                <h2><i class="fas fa-info-circle"></i> Company Information</h2>
                <div class="company-info">
                    <div class="info-row">
                        <span class="info-label">Company Name:</span>
                        <span class="info-value">Tech Company Inc.</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value">hr@techcompany.com</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone:</span>
                        <span class="info-value">+1 555 123 4567</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Location:</span>
                        <span class="info-value">San Francisco, CA</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Industry:</span>
                        <span class="info-value">Software Development</span>
                    </div>
                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit Information</button>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="card">
                <h2><i class="fas fa-chart-bar"></i> Recruitment Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-box">
                        <i class="fas fa-briefcase" style="font-size: 28px;"></i>
                        <div class="stat-number">8</div>
                        <div class="stat-label">Active Jobs</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-user-check" style="font-size: 28px;"></i>
                        <div class="stat-number">45</div>
                        <div class="stat-label">Total Applications</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-star" style="font-size: 28px;"></i>
                        <div class="stat-number">12</div>
                        <div class="stat-label">New Applications</div>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-handshake" style="font-size: 28px;"></i>
                        <div class="stat-number">6</div>
                        <div class="stat-label">Hired</div>
                    </div>
                </div>
            </div>

            <!-- Job Postings -->
            <div class="card jobs-section">
                <div class="job-header">
                    <h2><i class="fas fa-briefcase"></i> Active Job Postings</h2>
                    <button class="post-job-btn"><i class="fas fa-plus"></i> Post New Job</button>
                </div>

                <div class="job-item">
                    <div class="job-details">
                        <h3>Senior Full Stack Developer</h3>
                        <p><i class="fas fa-map-marker-alt"></i> San Francisco, CA</p>
                        <p><i class="fas fa-users"></i> 15 Applications</p>
                        <p><i class="fas fa-calendar"></i> Posted: Jan 10, 2026</p>
                    </div>
                    <div class="job-actions">
                        <button class="view-applications-btn"><i class="fas fa-eye"></i> Applications</button>
                        <button class="edit-job-btn"><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-job-btn"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>

                <div class="job-item">
                    <div class="job-details">
                        <h3>React Developer</h3>
                        <p><i class="fas fa-map-marker-alt"></i> Remote</p>
                        <p><i class="fas fa-users"></i> 22 Applications</p>
                        <p><i class="fas fa-calendar"></i> Posted: Jan 5, 2026</p>
                    </div>
                    <div class="job-actions">
                        <button class="view-applications-btn"><i class="fas fa-eye"></i> Applications</button>
                        <button class="edit-job-btn"><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-job-btn"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>

                <div class="job-item">
                    <div class="job-details">
                        <h3>Backend Engineer</h3>
                        <p><i class="fas fa-map-marker-alt"></i> New York, NY</p>
                        <p><i class="fas fa-users"></i> 8 Applications</p>
                        <p><i class="fas fa-calendar"></i> Posted: Jan 15, 2026</p>
                    </div>
                    <div class="job-actions">
                        <button class="view-applications-btn"><i class="fas fa-eye"></i> Applications</button>
                        <button class="edit-job-btn"><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-job-btn"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>

            <!-- Recent Applications -->
            <div class="card applications-section">
                <h2><i class="fas fa-inbox"></i> Recent Applications</h2>

                <div class="filter-controls">
                    <button class="filter-btn active"><i class="fas fa-inbox"></i> All</button>
                    <button class="filter-btn"><i class="fas fa-star"></i> New</button>
                    <button class="filter-btn"><i class="fas fa-eye"></i> Reviewed</button>
                    <button class="filter-btn"><i class="fas fa-check-circle"></i> Accepted</button>
                    <button class="filter-btn"><i class="fas fa-times-circle"></i> Rejected</button>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>John Smith - Senior Full Stack Developer</h3>
                        <p><small>Applied on: January 20, 2026</small></p>
                    </div>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <span class="status-badge status-new">New</span>
                        <div class="app-actions">
                            <button class="review-btn"><i class="fas fa-eye"></i> Review</button>
                            <button class="accept-btn"><i class="fas fa-check"></i> Accept</button>
                            <button class="reject-btn"><i class="fas fa-times"></i> Reject</button>
                        </div>
                    </div>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Jane Doe - React Developer</h3>
                        <p><small>Applied on: January 18, 2026</small></p>
                    </div>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <span class="status-badge status-reviewed">Reviewed</span>
                        <div class="app-actions">
                            <button class="accept-btn"><i class="fas fa-check"></i> Accept</button>
                            <button class="reject-btn"><i class="fas fa-times"></i> Reject</button>
                        </div>
                    </div>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Mike Johnson - Backend Engineer</h3>
                        <p><small>Applied on: January 16, 2026</small></p>
                    </div>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <span class="status-badge status-accepted">Accepted</span>
                        <div class="app-actions">
                            <button class="review-btn"><i class="fas fa-eye"></i> View Profile</button>
                        </div>
                    </div>
                </div>

                <div class="application-item">
                    <div class="app-info">
                        <h3>Sarah Williams - React Developer</h3>
                        <p><small>Applied on: January 12, 2026</small></p>
                    </div>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <span class="status-badge status-rejected">Rejected</span>
                        <div class="app-actions">
                            <button class="review-btn"><i class="fas fa-eye"></i> View Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/index.js"></script>
</body>

</html>