
--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `ImgID` int(11) NOT NULL,
  `ImgName` varchar(50) NOT NULL,
  `UploadTimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`ImgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `ImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;