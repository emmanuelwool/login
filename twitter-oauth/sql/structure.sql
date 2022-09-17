--
-- Database: `oauth_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
