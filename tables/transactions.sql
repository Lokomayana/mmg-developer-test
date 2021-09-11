
-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(50) NOT NULL,
  `user_id` bigint(50) NOT NULL,
  `owner_fname` varchar(30) NOT NULL,
  `owner_lname` varchar(30) NOT NULL,
  `wallet_id` varchar(50) NOT NULL,
  `wallet_type` varchar(50) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `charges` bigint(50) NOT NULL, 
  `phone_no` varchar(11) NOT NULL,
  `metre_no` varchar(30) NOT NULL,
  `IUC_no` varchar(30) NOT NULL,
  `service_provider` varchar(25) NOT NULL,
  `channel` varchar(50) NOT NULL, 
  `Bank` varchar(30) NOT NULL,
  `account_no` varchar(12) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `last4` varchar(12) NOT NULL,
  `transaction_id` varchar(7) NOT NULL,
  `transaction_type` varchar(20) NOT NULL, 
  `transaction_date` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `owner_fname`, `owner_lname`, `wallet_id`, `wallet_type`, `amount`, `charges`, `phone_no`, `metre_no`, `IUC_no`, `service_provider`, `channel`, `Bank`, `account_no`, `account_name`, `last4`, `transaction_type`, `transaction_date`, `transaction_time`, `status`) VALUES
(1, 1, 'Olamilekan', 'Hafiz', 'E793538457', 'Ecstacy', 40000, 50, '08154734869', '', '', 'MTN', 'wallet', '', '', '', '', 'Deposit', 'Aug 19, 2021', '06:47:51am', 'Success'),
(2, 34, 'Abosede', 'Aliyat', 'C793538456', 'Opera', 100000, 1000, '', '54181286367', '', 'IKEDC', 'wallet', '', '', '', '', 'Electricity', 'Aug 19, 2021', '09:36:17pm', 'Pending');



--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
