-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 07:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE slack;
USE slack;
--
-- Database: `slack`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(255) NOT NULL,
  `channel_type` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`channel_id`, `channel_name`, `channel_type`, `created_by`, `created_time`, `archive`) VALUES
(1, 'create', 'public', 20, '2017-10-31 17:10:31', 0),
(2, 'njdc', 'public', 20, '2017-10-31 17:11:09', 0),
(3, 'I am Legend', 'public', 2, '2017-11-19 04:49:11', 0),
(6, 'Images', 'public', 2, '2017-11-19 23:50:09', 0),
(7, 'Private Channel', 'private', 2, '2017-11-19 23:50:47', 0),
(8, 'Public Channel', 'public', 2, '2017-11-20 00:02:30', 0),
(10, 'Tow Mater\'s Tall Tales!?', 'private', 2, '2017-11-20 03:18:56', 1),
(11, 'Sally_channel_1', 'private', 3, '2017-12-09 21:04:24', 0),
(12, 'Doc_channel_1', 'private', 4, '2017-12-09 21:08:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `direct_message`
--

CREATE TABLE `direct_message` (
  `dmessage_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_desc` longtext NOT NULL,
  `create_on` datetime NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply_msg_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET latin1 NOT NULL,
  `ch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `created_by`, `created_time`, `reply_msg_id`, `message`, `ch_id`) VALUES
(31, 2, '2017-11-19 06:42:15', 0, '&lt;p&gt;I am Tow&lt;/p&gt;', 1),
(32, 2, '2017-11-19 06:42:46', 31, '&lt;p&gt;Hello Tow&lt;/p&gt;', 1),
(33, 2, '2017-11-19 06:44:37', 31, '&lt;p&gt;welcome to my world&lt;/p&gt;', 1),
(34, 2, '2017-11-19 06:46:26', 0, '&lt;p&gt;Tow Again&lt;/p&gt;', 1),
(35, 2, '2017-11-19 15:48:53', 0, '&lt;p&gt;SImple thread testing&lt;/p&gt;', 1),
(36, 3, '2017-11-19 15:48:53', 0, '&lt;p&gt;Sally thread testing&lt;/p&gt;', 1),
(38, 2, '2017-11-19 16:21:50', 31, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non n', 1),
(39, 2, '2017-11-19 16:22:01', 31, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non n', 1),
(40, 2, '2017-11-19 16:24:16', 0, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&lt;/pre&gt;', 1),
(41, 2, '2017-11-19 16:24:53', 35, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&lt;/pre&gt;', 1),
(42, 2, '2017-11-19 16:26:26', 0, '', 1),
(43, 2, '2017-11-19 16:31:32', 35, '&lt;p&gt;Heyy&lt;/p&gt;', 1),
(44, 2, '2017-11-19 16:37:43', 42, '&lt;p&gt;Hello&lt;/p&gt;', 1),
(51, 2, '2017-11-19 17:32:02', 0, '&lt;p&gt;This is new channel&lt;/p&gt;', 2),
(52, 2, '2017-11-19 17:38:09', 0, '&lt;p&gt;This is a new private channel&lt;/p&gt;', 4),
(53, 2, '2017-11-19 18:00:03', 0, '&lt;p&gt;Hii re&lt;/p&gt;', 4),
(54, 2, '2017-11-19 18:00:07', 0, '&lt;p&gt;Hii re&lt;/p&gt;', 4),
(56, 2, '2017-11-19 20:56:20', 0, '&lt;p&gt;Hello Tow How is this image ?&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;uploads/5a11efdaebed5_post.jpg&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;Light house btw&lt;/p&gt;', 1),
(57, 2, '2017-11-19 22:37:27', 0, '&lt;p&gt;Hello World&lt;/p&gt;', 1),
(58, 2, '2017-11-19 22:38:15', 57, '&lt;p&gt;Hey There&lt;/p&gt;', 1),
(59, 2, '2017-11-19 22:38:40', 0, '&lt;p&gt;Hello everyone&lt;/p&gt;', 4),
(60, 2, '2017-11-19 23:48:44', 0, '&lt;p&gt;Hello All&lt;/p&gt;', 3),
(61, 2, '2017-11-19 23:50:18', 0, '&lt;p&gt;Hii there&lt;/p&gt;', 6),
(62, 2, '2017-11-19 23:51:23', 0, '&lt;p&gt;This is my private channel&lt;/p&gt;', 7),
(63, 2, '2017-11-20 00:02:47', 0, '&lt;p&gt;My public channel&lt;/p&gt;', 8),
(64, 2, '2017-11-20 00:03:34', 0, '&lt;p&gt;Heyy&lt;/p&gt;', 9),
(65, 2, '2017-11-20 01:48:27', 0, '&lt;p&gt;Testing desc order message&lt;/p&gt;', 2),
(66, 2, '2017-11-20 01:49:25', 0, '&lt;p&gt;This is my last msg to ordering&lt;/p&gt;', 2),
(67, 2, '2017-11-20 02:05:44', 0, '&lt;pre&gt;I\'m happier than a tornado in a trailer park! &lt;/pre&gt;', 10),
(68, 2, '2017-11-20 02:06:14', 0, '&lt;p&gt;Hello&lt;/p&gt;', 10),
(69, 2, '2017-11-20 02:21:48', 0, '&lt;p&gt;This is my msg on top&lt;/p&gt;', 8),
(70, 2, '2017-11-20 05:05:11', 0, '<p>&lt;?php echo \"Nehh !!\" ?&gt;</p>', 1),
(76, 2, '2017-11-20 05:08:23', 0, '&lt;p&gt;', 6),
(77, 2, '2017-11-20 05:10:18', 0, '&lt;p&gt;', 6),
(78, 2, '2017-11-20 05:10:42', 0, '&lt;p&gt;', 6),
(80, 2, '2017-11-20 05:14:17', 0, '&lt;p&gt;', 2),
(81, 2, '2017-11-20 05:17:26', 0, '&lt;p&gt;', 2),
(82, 2, '2017-11-20 05:20:48', 0, '&lt;p&gt;&amp;lt;?php echo &quot;&quot;?&amp;gt;&lt;/p&gt;', 3),
(83, 2, '2017-11-20 05:22:28', 0, '&lt;p&gt;&amp;lt;?php ?&amp;gt;&lt;/p&gt;', 3),
(84, 5, '2017-12-09 20:24:30', 0, '&lt;p&gt;hi&lt;/p&gt;', 7),
(85, 5, '2017-12-09 20:24:32', 0, '&lt;p&gt;hi&lt;/p&gt;', 7),
(86, 5, '2017-12-09 21:09:43', 0, '&lt;p&gt;hiiiii&lt;/p&gt;', 12),
(87, 5, '2017-12-09 21:09:51', 0, '&lt;p&gt;hey&lt;/p&gt;', 12),
(88, 5, '2017-12-09 21:10:18', 0, '&lt;p&gt;what u doing&lt;/p&gt;', 12),
(89, 5, '2017-12-09 21:10:34', 86, '&lt;p&gt;whatsup&lt;/p&gt;', 12),
(90, 3, '2017-12-10 05:49:57', 0, '&lt;p&gt;&lt;img src=&quot;data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhIVFRUWFRUWFhYVFRUQFRUVFRUWFhUVFRUYHSggGBolHRUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGy0lHyUtLS0uLSstLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBFAMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQACAwEGB//EADkQAAEDAgQDBgUDAwMFAAAAAAEAAhEDIQQSMUEFUWETInGBkaEGMrHR8BTB4UJS8SNighUzcqLS/8QAGgEAAwEBAQEAAAAAAAAAAAAAAgMEAQUABv/EAC0RAAICAgICAQIFAwUAAAAAAAABAhEDIRIxBEETImEUIzJRgUJxkQWh0fDx/9oADAMBAAIRAxEAPwDwnDA5PGtMILhtJOW07L6fHGkfLeRkuQFncoSUa2itBh0dCOaE78y5lJTh2GWRw6ygllQsFJddSTEUF39Ms4m/KIa1IhZsCd1sMgX4SDZC4D4ZU0SjSRIpLlAIqEaQqcnYN2S4KMIgqmZaDyZQzzWD6ZRYULF5mqbRfB1wNUccYISh1NQUys5HnsMqcRvYKDiCG7FVNJesz6S1fiROiDDnkyin0QGlx2BK8vjeKveezLQwtmYNncjfygdfRcsiTSZX4+F5f09ez0juJMaLkE8hf32QNXjU6MF+cnny8EhBJBtpBG0A/Wcw9loRr0+o/kpi2Xw8LFHtWNKXEWk6ADprtt5p3hHBzZBkFeNeOVgTpOkftf2KKwWNfSMtMCWyDoZAJtz31WLQGfw1JfRpnrhTVi1Y8Ox7azcwsdxyP7hFOcAmUceUZRlT7F+KpqmHaiK7gsmWWManqjSrdL69NHF6xeFj2ei2hS/DrJmGumbmqraaXwRSsroD/TqI6Aot4Iz5GFcPCcUzZIaVXKi240IkR5YNuxoCtmJXRxMpjRdZETzi0aEKuVaLoCECzNtNXFJaNC0AWgtglSghalEJlUKWY2rC0ZBtsDqgBZduhsVikIK6ByoujibWxk6sox0pb2kphgwtTs9KHFBlOmtezVjUaxpc4w0CSSvN4z4ie53c7rPc31P2C1K2BhwZMz+nr9x+6mrMYvNDGOdr+fkomliiIvfc+e6Z8P3K3/p8q/V/sPi1JsbxtrSQwZo3mB5c0LxLib3jKDAuDGpiNenRK2sEkHy3vtPv6rOFdjPH8Ct5N/YZVOLVXgsIYAcoMB0w6/0SJ7c1VxPOJOtoBPsj8kCZBtJAGhMgDp/KHZhra3QPHzapdHQx44419KovTk2JJDiA6TGYWIzHy8oV3sLhncTJ5/1RA153K7Spt0guJBFhMHaw1/lE0cGYHaEBrZ7s3ub+8JihQTYCYuYvG/PN72WZYY6E+I0+t0X2bW6y7/11j7qDFxGVrRptyOhJ1FlrijTvDar2OBgwddpH8ZSnX60lI2Ypz7CSYOnLV1l39W7WdjrfzPmlyfpMlzeMsjv2Ou3lTtUto4sExoduo280S1yVbIJ4XB0wrOqFyqHKEorAohKq6pCq4rCo5C2Go2aGoohSVEPIZwCG1V2VjTC1hesxpIPwL09wzrLzeHdBTrCVU2L0ReRH2NWqwVKRstFpCzrVoCsS6Fw1V4yjtcJLxJpgwnGeULiWArRuN8WeOcwzdULSnWJwwlDOoJDgdSOZMAplNcG9DjDrenShFFNA5JKSE3Fsa+q4ie4NGjTxPVCMbqbQNgedrInF0e+4aEbaG/LmEOLG/wCEKtJLo62KMVBKPQTQZpyiZnbmevREVQRYRrlN5neQeWilBhDQTPeAMdM2vrIV2sGhA58jYRHKFvIMFawEX1LtZHK4I1i/1WrKI6gR013vujMPhp2A0F7kzyHmu1OxFnEnwt7LON9nrF1Yh0htt46rPD4YvMC3M/mp6Jgx9HZnufcrSlVZoGR/UbnYE8/yUbWj1lRWZTbFMXIOZx1OkeEGShXVS8meR8wJInmiX4UOEh0ANLu9AmSBE2nf0QtSLRM5b8pk6e3ql2eMW0gcsuj+60x1+g8lixjjbLOojTYkifIlEPLRY9Ji83uNVk7Set/rohabCKtpGAbw4OAItMDS+omFnRbmIEx4kNFhJubBXa8zIJB0nQ+3iqPaI6mI2iPweiW4M8UdWu0jYN/23AiO7fz1ReDxwMNdMwL85gfvr0Q2Yg93+lxcDYnaJ2OnuVhVNtbD62kBBKNAzxxmqZ6RrVaFjwqoX05d8wOU/sfRb1GoTjyTjJxZhVKDcZRbhK42ivVYyLSRi1iiNbRURcAfkKNpwrBq4yqtQENAtv2UyozCVIWAatGsRIXKmqHVCqjGvSShUhHMxFkwinA3xFRLzibqYmuhKYlYw4Q1sZ0MQrVHoJjVoSV6zHFWUqtlZGkt2rZtNeoLlQGKK0FJC8Y4vTod35n/ANvLxK81U45XcZzAdMrbeEheVFeHxcmVcukesfhGOuQCRvYwk3GcKGlpaBM6c+sIPDYupr2huOcm1rrSrVJIc0Elt8zj+xT4wfdlmLxZ453y0HU7jXQXGggXEg7W+iqyoyRedbH0G19EDiq8khvy8p+1lVtGBsLXcdBB1BR0WkxDnFxAJEOi9olSlQJN72I+on1VW4hurTodes6gbqza2YaQCRqb318vJYmmaM6eFpWL3bXa3/aNZ2lb9th2QezkEO3ifPx+iWVrOdlJjQQ4GdNYAt5LjKViLEkAzpAEyPGYRUD6DxXoERk5XkyhK+HBMU3nJva82JHUWGqGFA9QZVm0XbH88V6kEbMwdIaknzj0VncPonRz2+jh/O6GdWfz+xPVVNcjVoiYkW6/ZY0eDaPB6ZIBqm8aMv5XQ+K4U5oljg8biIcJ6ctFZtQPEh0GflNpkHl4BU7UtAIdeTIvLYjLtzGsny3Bo9YtcLQbR0g+CxrgWgzIBPR24TLEVQ75hJ/uFjbaELxCgGkQIsASYnMPm00CVNaCGfws+Q9s2BaY0EnNJjwhNK1NAfCdIhlR2xcAPEC/1TDEVYSfRxfJf58q/wC6AqrYXKTlniMQEMzEXWKSsNQbQ5aohmVbKJnIRwYtwdWU2orz2FdCaU8RZJg9FWfHvQyC0DwlX6paNrplk7xMOfVWBxRQlSsVyi0lZyCWJJbD2PJR1BiGwtJM6VNMRNkklpGcKryiHMQ1YLwqLs42opjceKVMv1OgHMnRKsXXLUpx+LNQjkAti03RZh8X5JK+gCtL3FzjLiST4rjaaOwOANQixDT/AFRY3i063XosJwyjRaXkZzcAunLMWAEWuj4JbO1yS0J6FNrAC8HNy8u6I5zO+gXOzBA1mJM6G+1/yFfFAmZbMlxkG5M6kCw323XNNBt43iT90cZWjKJli5gegn9kq4lXc7Q5Wi2uvMnxRtRpNzeLm9vy4SnEBzzA0CVnk3GkHFBOHEADXbw3n6+qMyk3JbYW0kjbzQQ4XXA7ve6DX3Q/6etmylrpOx+yUpyhriz2n7G36pjQCSN7Agm3RXZxgRamSdZJAt7oahwoNHftHK5/hH0mU2j5e7a7jy08AqYrI9vRjoEr8eqCSKTBHMu9YELPCfEhJh1IEc2m4jxsiMTxqg2wpB8bkAjyzIdmNpOksYGnwAU9t5Kjl/jQXroaNrMeJFuiFxFG9roV+IPMqxrmYd8xAI1tNwAOtlW5IE4ZH08BqQPVbPeHDeQADe5ImCRr6dFym5jpBJB8SZKxfSqMMxYf1Az6x+6VLfRpHmDby3ETIuuOpgi52m22354qoNt/tyU5gj6TbUz5IGePQcDqtZS7OZLSZPObz+3kg+KYmNEqpVyIM/nh6obiGJJ81PnfCFoi/CfmuX7kr4xTDYiSlbnonBm65UczlMsliSieqw5lq6q4R/dC4uqno5ElsVaLnbFF1aaHFK6W4stUkzSgCUfTpKmGYEdTanRiT5JmdPDoqjQWtJq2DUaRHPIzSi2EUwoZi3ajJZG6wrMWzCrOErAE6PO8ToSClWGwWYzqA4tIBg/L3fzovTcQYA0k6AJOcRTBmCG5pMEEju2GYETN7JmOO7Oz4MnKLCqVUUhEuAy922vSCbNkFZV+IBxc15gOM2s0u6cvvCXOxVp+a92mdBoenzJZiqxjX8KZOSStnQUbHrGm8WG58589PZVqsLs0AFrIBM6SdReCYBWOCa4U20wRmdMy4NA3ynloPRZB5AMa5TpvznrBI8tLkoHLWjQPHYkl+QASZkfKBP2lMcNg5ykt1bM/3cz43SvCUpqFxcASDMkjMT1HiPRer4Ph25YdSDt2uMEDUH/I5lew3tyMkzenh7T0AAsQABzAHVKcbiQ1xLbXNwc0co9Uy4tVbTbdpzm2aTZosdNBG3NeYrYprZLoc46AG4nc+H7psppK2Ykb4rEhkOcQ4kTF5Bky028ElxuJfV+Y2GgFgNlvlNRxMXJsP5sEfguFvqBwY1pyxMkDWbT5FSZIzzaukMVREtBuax1GnUKr6JFwmVXh7gczbESdrRqFo2lnAMXIuL2PL85pC8X+iXfphchW3FndEUMXEnMfrvPloqYrD/nmlzpBhS5Z5cLqW0EkmO8PipsTzvF7gAjqIHujqOIIP5v03XnaNRNqTu7JPemIkCAQTMa68lZ42bkgZKgqvSEZmRGpG48OiDJhGsqT3haZBjYm4np/8oPFwDbQ39dlS5KgUZv08/P/ABf2WMTrooHSulIdM0W1GwSOS1wz4KtjWXnmh2mCuFkj8WVoZ2j0uGr91RK6OJgKK+OZUQywbHFVyyBVnOVAVYKS0GUXI6i5Kqb0XQqokxWSI4oohrULhHSjZTDnT0yALZqoxaBaJZo1aBUaFqwLAGee+KsVlyUwASe8Z5DT915l1aYsBAjxuTJ9Uz+J2Ofiywa5WwP+JP3SNpRqVI+j8KCjhivtf+Tc1SBA1BkHr+AKuFp5nZnaD3d+XVKzxPdPPUQekonD/JredIN5kzPoI6rG7ZUG2IANnDvTM5g4CIbG3id7arGu0k5tBsATYwGyb6wB6q9GmGlwLpBaLth3eIkAmbbz1Gi3qU2mALATcmZ5eB0CZCNu2CLMNRmrAnnIBdAAMyB5L12Ae2nSzvOVoElx0gG+3lC83wos/UZXZ7tMFoa68WBB26/5QfxLxAuik09xuu2Y7E9OSVly/Fjk0ZTlKi/F+Pmu/wD0xGwLoNhyHNA08O7Ug3JvsTvB31WXDcMXSRMi4IGa+08hO/Reuo8OcHdtVLGgNkmA1gBBG9vwKbx1LKueR/2/YZJqOkLsDg5jyMHeOXr7po3h0zEgX39iVgzjFGnDabXVSAY/pbflInlstKmExGJHfc0CJ7NpiBtmbr6q+M1/SLd+wXG8Qo0xDR2ruQMN83fZIcPVc2o51QEZ7iTAHe5nUWLV6uh8Njx06cv5SP4mpMaRRaZdZzjrlEGG+N5joFJ5UXXO9rpfcOLXRlim38v3/hKcQzvJmw/6bZ1AgmIsNPNDdnmlyHOvmgv3CjoHbSW+WwAtqZkmdIEbb+q2p0vzwWoaWnkR58x5rYePxR5swp1CDbRXxZJDTbTSZIBJ190TUwpa1riQQ8GINxBgzuNtY9lnjZhskGCQ2OQ1OmhJkeKKcWlVgp30CtCjjC6AuFe6QQLidUM4I2tRMZkG5cLybc22FF2QPUVCupFh0PmPV5WAKsCu2pkDRrmV6da6ylUlecweNj7C4pM6NaV5WjUKdYKpoqITshz4Utj2kt2hDYZyNYEw5ktM61q3ptVWtXBVhYL7PH/HdDLUZUAHeEE9WzEeRK82xet+N2l9NpGjXSfMQvK0CARPMSOYm6xbkfSeBK8C+xs6g0sL2uAy5QWk95xMyWjkrZYAF73B0t4KY8szk0wQ06SZ8YXHYguAmLCBbbl139U7VlMb7DcAS0h0AxoHXaSLaTfVaue0NMyHWgNjKW/1A3kXiNVSnUa67Zbka1pBcDmJJkt/N1V7ZDjEZRJPnA0FpkBNj0e/uDYb/uGpJHdLfGUMaYzZnGIOaZAMi490bh2l2aBIb3nERpoLeJP4EJxGiLiZ8IIO9vb3SJxXFurCXZ2pxlwe57CH1HElz3Mbcu+a0QdUNiOJueQa9R9ToCIHgPlHkELVwxCHNOCuTly5l2v+BkYx9DX/AK41gijRDTpnee0d4gRAPqgKeLeH9oHuDzq4OId66rDIo5inllyydt9fwEkhjX4rianzV6h/5Fo84VadPsy3NqTJnqLHqEFTa6UxrYYwHOILpAEXERMyq/Hudzp8l7YL1owqvvkGm5TPC0RYEENkAmCY/mLpdTwxn8umeGqOhrC7uzIBgCTAkn7q7xlK25ICX2NH4dumcT35DgWjuju33JvZYhpiYtOu3OPoj64aco7rc1y58aiQQCNG6JaalumsdfBVypAovECdJtzki/lqELWdJWlepe9zAgjTQR7IV7lLlmgkXLlUXMKgJOi6WkKXJmo83QzqUrRqlGLw8XCYYXEzYruKalZIRyxsRCThKmIlERUo3UXNeKRZyQwBVgVmoSujyJKNpXQ1ZsK3COOwHo60I/DVYQIWgcmxdCZqz0uDxEpxhDK8bgMRDoK9XgaohURlaOX5OLixk8wErxleEZWriF5ri+IvAK16QrBj5SorxDFlzS3mCF5htjdNyd0FiWAmR5oFPezteNUPpOMw2bQg90u1iOiGpm4BtJF+S1xjMrjl0tcXQlUwmZJpfwWR2OcFh5FUscDlgxa9+c8gbidFnXeMp1NtrRcev8pPRrwRJgTdMGVtRe7Ytvvfpb2RYs8ZrRri0b8Le3MQ4uiI7oDjfNAje8KlczqZJME6m357LLAuguAuSANJ15cj1RApZi6IEAuuQ0w3zu7ojg7iY9MpQHa5g4y5v9x1boLnfaEJicNNtOStWcabmvbMj0I5FFDGUn96Q07tcdD4nVLfCVwn/wCoLfaFBABh1jz2KsaI5pi/AGsZbDucEW+ypSw7Q35dDqNfCP3Sfwztqk16Z7mZ0aRMWl0xEGbXlEPbmPQbLtE5SHMdBgmQSC2ZBbJ3j6rbDN3VUIegQZ7YI6LTDkAnM3MIIAnLcjunyN1V/efAI5XMDzKIIYS3IHDujNJBl98xEbIl2eZljnODWwAYkaAE5hMnn0S1zHnZNOIDKGtIIPzXEW2I5zf0QVSr9PdJzJN7bCQPkI1XaGGLjJsFthTLpOg9/FF5xKinT6YvJka0irKAAgLGrTRcrOoEEooQpOxa8QrtrzYqVwhHFSym4PRSlyQSWrqxZXURKcH7NphhCrC3LVXKmNCUzjQtAVWFESdAvZq0qF6zJVZRORlGwqJvw7iR0SRrZK9LwjAsid07BybJ/J4KOw5r3OCRcUaQ5epZShLuJ8OzqqcbRBhyqM99HmqpJCyGHcdF6KnwoaJjR4e0DRTvA29sqflxj0eawvC6jhG3IpnR+G2n5gndPK1B47jQZoZTlGMVsT+JyzdRO0vhegB3mArznGMCMPUdchpINPLeQfmE/wBJCNqfFLjYBVZh6mJBOYgxbosjOLf0lWKWSDvI9Hm6VQtdI0Nj4FNnwQAGtaWtgmT3iJvffwSbG4d1NxY8QR7+HNb8Nx7e6x4iLNcNTeYd9AsxZ4xnwl7OlVq0FupEhx5AT02CW1sJunIotIkuvsN//LlGoRrMG5ndqB1Nrhc5ZzDoOipyYY5FTMUqFWG4VV7LtA3ugXvGpOg3VqTrXANjrfXl1TH9G5odTZWe1juYIkayW9UufiK+VzSacBoaJaM0TPc5FeS4KkjLbOYqpMCACAG2AFmjeN9bqVK+RvXaFhSpwC50m2vW2vqs3HMf3WObr7hJJaJQsWlwkTJHM6wT1RtOsGuLiIALjAJEa2B1Q7XkANm05rmw2uFKeDdVaQDab+X+ULlwjrsGUktyAMRjnPdmcSbACTMNGjR0XcPTdUPTcp1hPh9ou8q/EQ1rcrBCg4ZGrmxT8qLfGAsr1QLAQOioyosSuSp3PYaiqDRUXDUQgqLhqL3yGfGdruQbytXuWJClyu2PgqKKLsLiQNPROYs8iIWLiuxJI5kWyuRVIWwVXoWjUzJcXHFUJKW2GkaNEmy9Fw/M1ohKOHYYk3Xp6FHKByVfjxfZH5eRfpDcO8kK+QoFuPa0xKKfjWkaqyjmShJeizaSlWqGjVC1MWALEJFj69Rx1slzmojMeFzew3HY6ZgrzmKcXFaue4mEwwnDyVHJvI6R0YKOFWC4Hh86pjiMaaDYCYUsOKYkrzfH8aHmAnNLFjv2DCTzT30LMfizWcS4+CALIRGVdNOVzHcncuzqwaiqXRRuMqAQHfQrelxvEAgmo54FoeS+24BNwh6jAOcrEhFKeWDVSf8AkZSZ6E/FGac1IjYQ8vgDQDMpS4vQJOdtSMpjKBOfbfRedhdDU6PnZ1p7M4RN8RiHO1PkNAmmF412eHNA0w6bh3L7lL8Nh55aTddLRPRHF5IXkb2wZcX2aHEl8Q2I1P2TfAV4EJQ0jayIo1IWRzScrkybMuaoeur2S/FXXG1lV7pT5TtEsIcWA1KaFqFH1UFVChyotgzAuXC5ccqqNyY9IKwdDOQF6/C/DTcsxqvIcLxGSoDsvqHDq4ewEcl1fBjCULrZzvOyTg1XQgHwyzkur0L33UVvxx/Yh/EZP3PBOdZYlyii582dGKJ2iq6oooluTDUUZNMmF6zhfDaZaJEqKKzxEmm2S+bJxiqF/FHllRrWBPKVaWAFRROx/qZLlX5cWKsVg5MysXNdsVFEckFCbaBn5huuU2ucYBUUUsluii/psZ4bAAXKZ0G3soonwikQTk5di74ixsNgLyDnKKKPypPnR1vDilj0clWaVFFNZUwhsHUKj8Mw7Qoom9rYq2noy/SN5lWeGxEKKJT10Gm32ZOcs86iiRKTGJF2OWzHKKJkGDJBDXq+dRRUpiGij3IWqoogkHAFeFmVFFDJbKUVXsPhTix+QqKKrwZuOWl7E+XBSxuz1D5Kiii7ZwD/2Q==&quot; alt=&quot;&quot; width=&quot;276&quot; height=&quot;183&quot; /&gt;&lt;/p&gt;', 0),
(91, 3, '2017-12-10 05:50:43', 0, '&lt;p&gt;&lt;img src=&quot;data:image/jpeg;base64,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&quot; alt=&quot;&quot; width=&quot;276&quot; height=&quot;183&quot; /&gt;&lt;/p&gt;', 7),
(92, 3, '2017-12-10 05:51:11', 0, '&lt;p&gt;&lt;img src=&quot;uploads/5a2ccb44a9d40_post.jpg&quot; /&gt;&lt;/p&gt;', 7);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `user_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`user_id`, `otp`) VALUES
(31, 54122),
(31, 13061),
(31, 58164),
(31, 25890),
(31, 88236),
(31, 79131),
(31, 40798),
(31, 71338),
(31, 17700),
(31, 71984),
(31, 47967),
(31, 23936),
(31, 71221),
(31, 59808),
(31, 15295),
(31, 44413),
(31, 34731),
(31, 56444),
(31, 80550),
(31, 10174),
(31, 90159),
(31, 10026),
(1, 31792),
(31, 55077),
(1, 66028),
(1, 77348),
(31, 45001),
(31, 39504),
(31, 84422),
(31, 83078),
(31, 18961),
(31, 21253),
(31, 73796),
(31, 53064),
(31, 65231),
(31, 57249),
(31, 16562),
(31, 14877),
(31, 92439),
(1, 42207),
(1, 78014),
(31, 40837),
(1, 63252),
(31, 22957),
(31, 30430),
(1, 38133),
(31, 59556),
(31, 77272),
(1, 40769),
(1, 24113),
(31, 30302),
(31, 91341),
(31, 18340),
(31, 53838),
(31, 61793),
(31, 36807),
(31, 25022),
(31, 61453),
(31, 98351),
(31, 89329),
(31, 35998),
(31, 35917),
(31, 62810),
(31, 44427),
(31, 65700),
(31, 23915),
(31, 14449),
(31, 92983),
(31, 87781),
(31, 31906),
(31, 40682),
(31, 78851),
(31, 95663),
(1, 79833),
(1, 71527),
(31, 14371),
(31, 56777),
(31, 73242),
(1, 74953),
(31, 61813),
(31, 46199),
(31, 38916),
(31, 56983),
(31, 34359),
(31, 72185),
(31, 49750),
(1, 87134),
(1, 36235),
(1, 16817),
(31, 41429),
(31, 62588),
(31, 41164),
(31, 75540),
(31, 40821),
(1, 30575),
(1, 35510),
(1, 57157),
(1, 13974),
(1, 85430),
(31, 84450);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`user_id`, `img_id`, `img_path`) VALUES
(1, 1, '4.jpeg'),
(2, 6, '2.jpeg'),
(3, 7, '3.jpeg'),
(4, 8, '4.jpeg'),
(6, 12, '6.jpeg'),
(5, 13, '5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reaction` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reaction_id`, `user_id`, `message_id`, `reaction`) VALUES
(1, 3, 6, 0),
(7, 2, 2, 1),
(4, 7, 6, 1),
(6, 1, 2, 1),
(8, 1, 70, 1),
(9, 2, 81, 0),
(10, 2, 80, 0),
(11, 2, 62, 0),
(12, 5, 86, 1),
(13, 5, 89, 1),
(14, 3, 69, 1),
(15, 3, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'userfirstname',
  `last_name` varchar(50) NOT NULL DEFAULT 'userlastname',
  `phone_number` varchar(10) NOT NULL DEFAULT '1234567891',
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `Admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `phone_number`, `status`, `Admin`) VALUES
(1, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'nandith.malapati@gmail.com', '', '', '', '', 1),
(2, 'Tow1', 'f2713f8c4763a103066d1dffd8193111', 'mater@rsprings.gov', 'Tow', 'Mater', '', '', 0),
(3, 'Sally', '4751b70fa5d1412cf62fcd418c80a76a', 'porsche@rsprings.gov', 'Sally', 'Carrera', '', '', 0),
(4, 'Doc', '350e1009f98c92239f7fd111919ee749', 'hornet@rsprings.gov', 'Doc', 'Hudson', '', '', 0),
(5, 'Finn', 'a8336e73bfa7ac1852de9f5de304b9e3', 'topsecret@agent.org', 'Finn', 'McMissile', '', '', 0),
(6, 'Lightning', 'aee1a720dc709f363b96356fa3ef2628', 'kachow@rusteze.com', 'Lightning', 'McQueen', '', '', 0),
(8, 'kavya1', '49a731d91ff33e8da6abf8698be6d1cd', 'kavyashreesp@outlook.com', 'bshbdhq', 'bcssj', '1234567891', 'jik', 0),
(31, 'Nandi', '58ba7bfc50db2d50bb1ecc3f11e2498e', 'honeyjyothi9@gmail.com', 'Nandith', 'Reddy', '7573181618', 'available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_channel`
--

CREATE TABLE `user_channel` (
  `user_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_channel`
--

INSERT INTO `user_channel` (`user_id`, `channel_id`) VALUES
(1, 2),
(2, 1),
(2, 2),
(3, 7),
(4, 11),
(5, 7),
(5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `wid` int(10) NOT NULL,
  `wname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`wid`, `wname`) VALUES
(1, 'oducs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`channel_id`);

--
-- Indexes for table `direct_message`
--
ALTER TABLE `direct_message`
  ADD PRIMARY KEY (`dmessage_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reaction_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`message_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_channel`
--
ALTER TABLE `user_channel`
  ADD UNIQUE KEY `user_id` (`user_id`,`channel_id`),
  ADD KEY `channel_fk` (`channel_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`wid`),
  ADD UNIQUE KEY `wname` (`wname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `direct_message`
--
ALTER TABLE `direct_message`
  MODIFY `dmessage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `wid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD CONSTRAINT `user fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_channel`
--
ALTER TABLE `user_channel`
  ADD CONSTRAINT `channel_fk` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`channel_id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
