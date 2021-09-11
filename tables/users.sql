SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz users`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `wallet_users`
--

CREATE TABLE `wallet_users` (
  `id` bigint(50) NOT NULL,
  `first_name` varchar(20) NOT NULL, 
  `last_name` varchar(20) NOT NULL, 
  `uname` varchar(20) NOT NULL, 
  `gender` varchar(12) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gsm` varchar(15) NOT NULL,
  `country` varchar(12) NOT NULL DEFAULT 'Nigeria',
  `states` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `addr` text NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `tweeter` varchar(50) NOT NULL,
  `facecbookk` varchar(100) NOT NULL,
  `profile_pix` varchar(50) NOT NULL,
  `pasweyd` varchar(60) NOT NULL,
  `user_rank` varchar(20) NOT NULL DEFAULT 'Basic',  
  `referer` varchar(30) NOT NULL,
  `referrals` bigint(30) NOT NULL,
  `referral_link` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',  
  `reg_date` varchar(30) NOT NULL,
  `loggedin` varchar(4) NOT NULL DEFAULT 'NO',
  `lastlogin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




--
-- Indexes for table `wallet_users`
--
ALTER TABLE `wallet_users`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for table `wallet_users`
--
ALTER TABLE `wallet_users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

