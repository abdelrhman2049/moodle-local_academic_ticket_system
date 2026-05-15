## Academic Ticket System ##
Short Description
A robust and modern Moodle local plugin designed to streamline communication between students and academic support departments. It provides a centralized hub for managing inquiries, technical issues, and administrative requests with a high-end User Experience (UX).

Detailed Description
The Academic Ticket System is more than just a contact form; it's a full lifecycle management tool for academic support. Built with a focus on Instructional Design (LXD) principles and a modern Tailwind CSS interface, it ensures that the learning journey isn't interrupted by technical or administrative hurdles.

## Key Features: ##

Modern UI/UX: A clean, responsive dashboard that fits perfectly within the Moodle ecosystem while offering a modern "SaaS" feel.

Smart Attachment System: Support for multiple file uploads with Inline Previews for images, videos, and PDFs, allowing admins to see issues without downloading files.

Department-Based Routing: Tickets can be categorized into specific departments (e.g., Technical Support, Student Affairs, Finance) for faster response times.

Role-Based Access: Specialized views for Students (to track their tickets) and Administrators/Staff (to manage and assign tickets).

Activity Timeline: A detailed audit log (Activity Log) that tracks every status change, assignment, and reply for full accountability.

Rich Text Support: Full integration with Moodle's TinyMCE/Atto editors for detailed issue descriptions and replies.

Installing via uploaded ZIP file
Log in to your Moodle site as an admin and go to Site administration > Plugins > Install plugins.

Upload the ZIP file with the plugin code. You should only be prompted to add extra details if your plugin type is not automatically detected.

Check the plugin validation report and finish the installation.

## Installing manually ## 
The plugin can be also installed by putting the contents of this directory to

{your/moodle/dirroot}/local/academic_ticket_system
Afterwards, log in to your Moodle site as an admin and go to Site administration > Notifications to complete the installation.

Alternatively, you can run

$ php admin/cli/upgrade.php
to complete the installation from the command line.

## License ##
2026 learn-ix support@learn-ix.com

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
