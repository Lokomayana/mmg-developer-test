
--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(50) NOT NULL,
  `owner_id` bigint(50) NOT NULL,
  `owner_fname` varchar(30) NOT NULL,
  `owner_lname` varchar(30) NOT NULL,
  `wallet_id` varchar(10) NOT NULL,
  `wallet_type` varchar(20) NOT NULL,
  `balance` bigint(50) NOT NULL,
  `monthly_rate` int(10) NOT NULL DEFAULT '0',
  `annual_rate` int(10) NOT NULL DEFAULT '0',
  `Jan_interest` bigint(50) NOT NULL,
  `Feb_interest` bigint(50) NOT NULL,
  `Mar_interest` bigint(50) NOT NULL,
  `Apr_interest` bigint(50) NOT NULL,
  `May_interest` bigint(50) NOT NULL,
  `Jun_interest` bigint(50) NOT NULL,
  `Jul_interest` bigint(50) NOT NULL,
  `Aug_interest` bigint(50) NOT NULL,
  `Sep_interest` bigint(50) NOT NULL,
  `Oct_interest` bigint(50) NOT NULL,
  `Nov_interest` bigint(50) NOT NULL,
  `Dec_interest` bigint(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `curr_year` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `owner_id`, `owner_fname`, `owner_lname`, `wallet_id`, `wallet_type`, `balance`, `monthly_rate`, `annual_rate`, `Jan_interest`, `Feb_interest`, `Mar_interest`, `Apr_interest`, `May_interest`, `Jun_interest`, `Jul_interest`, `Aug_interest`, `Sep_interest`, `Oct_interest`, `Nov_interest`, `Dec_interest`) VALUES
(1, 12, 'Olamilekan', 'Hafiz', 'C793538456', 'Opera', 12500, 2, 24, 0, 0, 0, 0, 0, 5000, 0, 0, 0, 0, 0, 0),
(2, 20, 'Abosede', 'Aliyat', 'E793538457', 'Ecstacy', 7500, 2, 24, 0, 0, 0, 0, 0, 0, 0, 0, 750, 0, 0, 0),
(3, 20, 'Sanusi', 'Ibrahim', 'R793538458', 'Royalty', 56500, 2, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);





--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
