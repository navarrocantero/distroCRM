create table distro
(
	id int auto_increment
		primary key,
	name text not null,
	last_update datetime not null,
	os_type text null,
	origin text null,
	architecture text null,
	desktop text null,
	category text null,
	Status text null,
	home_page text null,
	description text null,
	image_logo text null,
	image_desktop text null
)
;


INSERT INTO distrowatch.distro (name, last_update, os_type, origin, architecture, desktop, category, Status, home_page, description, image_logo, image_desktop) VALUES ('Slackware Linux', '2017-10-23 23:39:00', 'Linux', 'USA', 'arm, i586, s390, x86_x64', 'Blackbox, Fluxbox, FVWM, KDE, WMaker, Xfce', 'Desktop, Server', 'Active', 'http://www.slackware.com/', 'The Official Release of Slackware Linux by Patrick Volkerding is an advanced Linux operating system, designed with the twin goals of ease of use and stability as top priorities. Including the latest popular software while retaining a sense of tradition, providing simplicity and ease of use alongside flexibility and power, Slackware brings the best of all worlds to the table. Originally developed by Linus Torvalds in 1991, the UNIX-like Linux operating system now benefits from the contributions of millions of users and developers around the world. Slackware Linux provides new and experienced users alike with a fully-featured system, equipped to serve in any capacity from desktop workstation to machine-room server. Web, ftp, and email servers are ready to go out of the box, as are a wide selection of popular desktop environments. A full range of development tools, editors, and current libraries is included for users who wish to develop or compile additional software. ', 'https://distrowatch.com/images/yvzhuwbpy/slackware.png', 'https://distrowatch.com/images/cgfjoewdlbc/slackware.png');