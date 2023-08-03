###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************************
Bincom Asseessment Description
*******************************

*******************************************************
BASIC PROGRAMMING TEST: Experienced Software Developer
*******************************************************

************
Background:
************

- The database is: bincom_test.sql. Download the Database at https://drive.google.com/file/d/0B77xAtHK1hd4Ukx6SHpqTkd6TWM/view It contains Dummy result for the 2011 elections from different polling units, wards, and LGA.


- From INEC: Polling units are under Wards, Wards are under LGAs are under States


- The central idea of this client project is that given all the individual results announced in polling units (announced_pu_results) under any LGA, we should be able to get an estimated result for that LGA. This can then be cross-checked with the result announced at the local government level (announced_lga_results)


- Table: polling_units contains a list of polling units (each polling unit has a ward ID, LGA, ID, and state ID)


- Table: ward contains a list of wards


- Table: LGA contains a list of LGA.


- Table: ‘announced_pu_results’ contains dummy results of various polling units – NOTE: Result from each polling units is stored on about 9 rows with the score from each party being individual rows.


i.e. for polling_unit_unit_uniqueid = 8 we have results as follows:

PDP: 802, DPP: 719, CAN: 416, PPA: 939, CDC: 394, JP:

‘polling_unit’.uniqueid = ‘announced_pu_results’.polling_unit_uniqueid (Note the difference between polling_unitid and polling_unit_uniqueid)


- Table: ‘announced_lga_results’ contains dummy results of various local governments as announced at the local government coalition center.


************
Question 1:
************
Create a page to display the result for any individual polling unit on a web page. Note that the Database you have been given only contains LGA’s in Delta State (state id: 25)



************
Question 2:
************
Create a page to display the summed total result of all the polling units under any particular local government. Local Government should be selected using a select box.
Do NOT use the announced LGA result table to display this required result. The announced LGA table is designed to be used for a comparison of a summed total of all polling unit results under any particular LGA.



************
Question 3:
************
Create a page to be used to store results for ALL parties for a new polling unit.


*******
Hints:
*******
- We are testing your basic programming ability.

- Ensure your solution is VERY user friendly. For example, use a chained combo box where possible. (You may also browse any website of your choice to get code snippets and tutorials, if necessary)


*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.