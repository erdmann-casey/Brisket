--
-- Table structure for table `Text`
--

CREATE TABLE `Text` (
  `TextID` int(11) NOT NULL,
  `Text` varchar(500) NOT NULL,
  `UploadTimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Text`
--
ALTER TABLE `Text`
  ADD PRIMARY KEY (`TextID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Text`
--
ALTER TABLE `Text`
  MODIFY `TextID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;