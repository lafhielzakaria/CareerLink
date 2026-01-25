<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CareerLink</title>
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
            max-width: 1400px;
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
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
            font-size: 18px;
        }

        .card h2 i {
            color: #667eea;
            font-size: 24px;
        }

        /* Stats */
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

        /* Full Width Sections */
        .full-width {
            grid-column: 1 / -1;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
        }

        .add-btn:hover {
            background: #5a67d8;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9f9f9;
            padding: 15px;
            text-align: left;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #eee;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #555;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background: #cfe2ff;
            color: #084298;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 8px;
        }

        .edit-btn,
        .delete-btn,
        .view-btn,
        .approve-btn {
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.3s;
        }

        .edit-btn {
            background: #667eea;
            color: white;
        }

        .edit-btn:hover {
            background: #5a67d8;
        }

        .view-btn {
            background: #17a2b8;
            color: white;
        }

        .view-btn:hover {
            background: #138496;
        }

        .approve-btn {
            background: #28a745;
            color: white;
        }

        .approve-btn:hover {
            background: #218838;
        }

        .delete-btn {
            background: #ff6b6b;
            color: white;
        }

        .delete-btn:hover {
            background: #ee5a52;
        }

        /* Filter Controls */
        .filter-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: white;
            font-size: 14px;
            cursor: pointer;
        }

        /* Admin Settings Card */
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .setting-item {
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .toggle {
            position: relative;
            width: 50px;
            height: 24px;
            background: #ddd;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toggle.active {
            background: #667eea;
        }

        .toggle::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            top: 2px;
            left: 2px;
            transition: 0.3s;
        }

        .toggle.active::after {
            left: 28px;
        }

        /* Charts */
        .chart-container {
            height: 300px;
            background: #f9f9f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-shield-alt"></i> Admin Dashboard</h1>
            <div class="user-info">
                <div>
                    <p>Welcome, <strong>Admin User</strong></p>
                    <small>System Administrator</small>
                </div>
                <div class="user-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
                <a href="/logout" class="logout-btn">Logout</a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="main-content">
            <div class="card stat-box">
                <i class="fas fa-users" style="font-size: 28px;"></i>
                <div class="stat-number">254</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="card stat-box">
                <i class="fas fa-briefcase" style="font-size: 28px;"></i>
                <div class="stat-number">48</div>
                <div class="stat-label">Job Postings</div>
            </div>
            <div class="card stat-box">
                <i class="fas fa-file-alt" style="font-size: 28px;"></i>
                <div class="stat-number">1,230</div>
                <div class="stat-label">Applications</div>
            </div>
            <div class="card stat-box">
                <i class="fas fa-tasks" style="font-size: 28px;"></i>
                <div class="stat-number">12</div>
                <div class="stat-label">Pending Reviews</div>
            </div>
        </div>

        <!-- Users Management -->
        <div class="card full-width" style="margin-bottom: 30px;">
            <div class="section-header">
                <h2><i class="fas fa-users"></i> Users Management</h2>
                <button class="add-btn"><i class="fas fa-plus"></i> Add User</button>
            </div>

            <div class="filter-controls">
                <input type="text" class="filter-input" placeholder="Search users...">
                <select class="filter-select">
                    <option>All Roles</option>
                    <option>Candidate</option>
                    <option>Recruiter</option>
                    <option>Admin</option>
                </select>
                <select class="filter-select">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Candidate</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>Jan 10, 2026</td>
                            <td>
                                <div class="action-btns">
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>Jane Smith</td>
                            <td>jane@techcompany.com</td>
                            <td>Recruiter</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>Dec 20, 2025</td>
                            <td>
                                <div class="action-btns">
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#003</td>
                            <td>Mike Johnson</td>
                            <td>mike@example.com</td>
                            <td>Candidate</td>
                            <td><span class="status-badge status-inactive">Inactive</span></td>
                            <td>Jan 5, 2026</td>
                            <td>
                                <div class="action-btns">
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Job Postings Management -->
        <div class="card full-width" style="margin-bottom: 30px;">
            <div class="section-header">
                <h2><i class="fas fa-briefcase"></i> Job Postings</h2>
                <button class="add-btn"><i class="fas fa-plus"></i> New Job</button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Posted Date</th>
                            <th>Applications</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senior Full Stack Developer</td>
                            <td>Tech Company Inc.</td>
                            <td>San Francisco, CA</td>
                            <td>Jan 10, 2026</td>
                            <td>15</td>
                            <td><span class="status-badge status-approved">Approved</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>React Developer</td>
                            <td>Digital Solutions</td>
                            <td>Remote</td>
                            <td>Jan 15, 2026</td>
                            <td>22</td>
                            <td><span class="status-badge status-approved">Approved</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="view-btn"><i class="fas fa-eye"></i> View</button>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Backend Engineer</td>
                            <td>Cloud Systems Corp</td>
                            <td>New York, NY</td>
                            <td>Jan 20, 2026</td>
                            <td>8</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="approve-btn"><i class="fas fa-check"></i> Approve</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Categories Management -->
        <div class="card full-width" style="margin-bottom: 30px;">
            <div class="section-header">
                <h2><i class="fas fa-tags"></i> Job Categories</h2>
                <button class="add-btn"><i class="fas fa-plus"></i> Add Category</button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Job Count</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Software Development</td>
                            <td>Programming and software engineering roles</td>
                            <td>24</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Marketing</td>
                            <td>Marketing and promotional roles</td>
                            <td>8</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sales</td>
                            <td>Sales and business development roles</td>
                            <td>12</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-btns">
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- System Settings -->
        <div class="card full-width" style="margin-bottom: 30px;">
            <h2><i class="fas fa-cog"></i> System Settings</h2>

            <div class="settings-grid">
                <div class="setting-item">
                    <div>
                        <strong>Email Notifications</strong>
                        <p style="font-size: 13px; color: #888; margin-top: 5px;">Enable email alerts for new applications</p>
                    </div>
                    <div class="toggle active"></div>
                </div>

                <div class="setting-item">
                    <div>
                        <strong>Auto-Approval</strong>
                        <p style="font-size: 13px; color: #888; margin-top: 5px;">Automatically approve job postings</p>
                    </div>
                    <div class="toggle"></div>
                </div>

                <div class="setting-item">
                    <div>
                        <strong>Maintenance Mode</strong>
                        <p style="font-size: 13px; color: #888; margin-top: 5px;">Put system in maintenance mode</p>
                    </div>
                    <div class="toggle"></div>
                </div>

                <div class="setting-item">
                    <div>
                        <strong>Two-Factor Authentication</strong>
                        <p style="font-size: 13px; color: #888; margin-top: 5px;">Require 2FA for admin accounts</p>
                    </div>
                    <div class="toggle active"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/index.js"></script>
</body>

</html>