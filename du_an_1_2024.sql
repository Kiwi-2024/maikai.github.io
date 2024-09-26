CREATE DATABASE  IF NOT EXISTS `du_an_1_2024` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `du_an_1_2024`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: du_an_1_2024
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audiofiles`
--

DROP TABLE IF EXISTS `audiofiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audiofiles` (
  `MaAudio` int NOT NULL AUTO_INCREMENT,
  `TenAudio` varchar(225) NOT NULL,
  `Audio_url` text NOT NULL,
  `HinhAnhBia` varchar(225) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaAudio`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `audiofiles_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `audiofiles_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audiofiles`
--

LOCK TABLES `audiofiles` WRITE;
/*!40000 ALTER TABLE `audiofiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `audiofiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chuong_sach`
--

DROP TABLE IF EXISTS `chuong_sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuong_sach` (
  `MaChuong` int NOT NULL AUTO_INCREMENT,
  `TenChuong` varchar(255) NOT NULL,
  `NoiDung` text,
  `SoChuong` int NOT NULL,
  `sach_id` int DEFAULT NULL,
  `sach_soi_id` int DEFAULT NULL,
  `sach_tomtat_id` int DEFAULT NULL,
  PRIMARY KEY (`MaChuong`),
  KEY `sach_tomtat_id` (`sach_tomtat_id`),
  KEY `sach_soi_id` (`sach_soi_id`),
  KEY `sach_id` (`sach_id`),
  CONSTRAINT `chuong_sach_ibfk_1` FOREIGN KEY (`sach_tomtat_id`) REFERENCES `sach_tomtat` (`MaSach`),
  CONSTRAINT `chuong_sach_ibfk_2` FOREIGN KEY (`sach_soi_id`) REFERENCES `sach_soi` (`MaSach`),
  CONSTRAINT `chuong_sach_ibfk_3` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuong_sach`
--

LOCK TABLES `chuong_sach` WRITE;
/*!40000 ALTER TABLE `chuong_sach` DISABLE KEYS */;
INSERT INTO `chuong_sach` VALUES (4,'Chương 1:','Thương em, anh cũng muốn vô\r\nSợ truông nhà Hồ, sợ phá Tam Giang\r\nPhá Tam Giang ngày rày đã cạn\r\nTruông nhà Hồ, nội tán cấm nghiêm.\r\nCho đến tận bây giờ, nhiều người dân ở miền Trung nắng gió vẫn\r\ncòn thuộc lòng những câu thơ ấy. Nghe qua có vẻ đơn giản, nhưng\r\nchẳng mấy ai biết được rằng đằng sau những câu thơ đó lại ẩn\r\nchứa khoảng ký ức về một thời kỳ kinh hoàng.\r\nTruông nhà Hồ trước đây vốn nằm tiếp giáp với hai châu Địa Lý\r\nvà Minh Linh, nay thuộc địa phận tỉnh Quảng Trị và Quảng Bình.\r\nThuở trước, nơi đây vốn là một vùng đất hoang vu hẻo lánh, cây cối\r\nbạt ngàn, cỏ mọc cao quá đầu người. Nhắc đến truông nhà Hồ,\r\nngười dân quanh vùng đều run rẩy sợ hãi. Cái họ sợ không phải là\r\nbãi đất hoang sơ, cỏ mọc um tùm nhiều rắn rết. Thứ làm cho họ\r\nkhiếp đảm thực sự chính là sào huyệt của một băng cướp nguy\r\nhiểm, dân gian quen gọi với danh từ thảo khấu.\r\nCâu chuyện xảy ra vào thời chúa Nguyễn ở Đàng Trong, khi ấy\r\ntruông nhà Hồ nổi lên như một địa danh khét tiếng. Hễ cứ ai đi qua\r\nđó thường bị bọn cướp bắt bớ, giết chóc, trấn lột của cải, đòi tiền\r\nmãi lộ. Một ngày nọ, có gia đình buôn tơ lụa người miền ngược đi\r\nngang qua, nhân khẩu cũng phải lên đến hơn trăm người đều bị bọn\r\ncướp giết sạch, rồi tẩu tán đồng tơ lụa đi khắp nơi.\r\nNgười ta kể lại rằng, hơn trăm mạng người của gia đình buôn tơ\r\nlụa bị giết hại một cách dã man, người bị chém lìa đầu, người bị\r\nđâm thấu tim, lại có người bị đâm lòi bụng. Sau cơn giết người tàn\r\nbạo ấy, máu nhuộm đỏ cả đất, đứng cách xa mấy dặm đường vẫn\r\ncòn ngửi thoang thoảng mùi máu tanh. Đám cướp cạn chém giết\r\ngần hết gia tộc nọ, nhưng nghe đâu còn sót lại người vợ đang mang\r\nbầu của ông chủ buôn tơ. Không ai có thể hiểu nổi làm thế nào mà\r\nmột người đàn bà bụng mang dạ chửa lại có thể trốn thoát. Dân\r\ntrong vùng suy đoán, có thể thị đã lẩn trốn vào đám lau sậy um tùm,\r\nrồi ẩn nấp ở đó chờ đám cướp rút lui mới tìm đường thoát. Chẳng rõ\r\nngười đàn bà bụng chửa ấy đã đi đâu, cứ như thể thị đã tan biến\r\nkhỏi mặt đất.\r\nTừ sau vụ cướp đẫm máu ấy, danh tiếng của truông nhà Hồ cứ\r\nnhư thế lớn dần, không còn ai dám qua lại nơi đó nữa. Phần vì sợ\r\ncướp, phần vì lời đồn đại những bóng ma màu trắng toát bay phất\r\nphơ qua lại trên ngọn cây, mặt nước vào những đêm mưa gió. Dân\r\ntrong vùng bảo rằng đó là oan hồn của đại gia đình buôn tơ lụa bị\r\nbọn cướp giết ngày nào.\r\nLúc bấy giờ có một vị quan nội tán triều Nguyễn tên là Nguyễn\r\nKhoa Đăng, nổi tiếng thông minh, tài giỏi. Quan nội tán biết được\r\nmối lo sợ của dân chúng, ông bèn tìm cách dẹp tan băng cướp lộng\r\nhành. Đêm hôm ấy, trời tối như hũ nút, không có ánh trăng soi chiếu\r\nnhư mọi khi, quan cho xe chở lúa và hàng hóa chạy qua truông.\r\nTrong xe, ông bố trí một người lính ngồi trong thùng và rải lúa ra dọc\r\nđường. Nhờ có dấu lúa rải này mà quan nội tán tìm được sào huyệt\r\ncủa bọn cướp, quan quân triều đình tràn vào bắt gọn. Bọn cướp\r\ntháo chạy, nhưng đa phần bị quân triều đình bắt giữ giải về kinh chịu\r\ntội. Băng cướp tan rã, cái họa truông nhà Hồ cũng chẳng còn, từ đó\r\ndân chúng qua lại truông được yên bình.\r\nĐám cướp tan rã, chỉ còn hơn chục người còn lại kịp chạy thoát\r\nthân. Những người ấy không phải là kẻ đầu sỏ, mà chỉ là những tên\r\nsai vặt. Đám người ấy có già, có trẻ, có trai, có gái, họ chạy thoát\r\nnhờ chui vào giếng, trốn vào bụi cây um tùm nhằm tránh khỏi sự\r\ntruy bắt của quan quân triều đình.\r\nSào huyệt để ẩn náu không còn, mọi thứ vũ khí, của cải cướp\r\nđược đều bị thu giữ, hơn mười người còn sót lại quyết định di\r\nchuyển về thành Thăng Long. Người ta không thể lý giải vì sao mà\r\ntàn dư của băng cướp có thể vượt quãng đường dài đằng đẵng từ\r\ntruông nhà Hồ đến tận kinh thành. Chỉ biết rằng khi đám người đi\r\nđến kinh thành thì gần như kiệt sức. Dân trong thành thấy diện mạo\r\ncủa họ có phần lạ kỳ, mái tóc bạc phơ, quần áo rách rưới, cả người\r\ntoát ra vẻ lạnh lẽo u ám như vừa từ dưới âm ty địa ngục chui lên,\r\nbèn ra sức xua đuổi.\r\nSống giữa chốn phố thị không được, họ đành di chuyến về một\r\nvùng đất hoang vu, quanh năm mây mù giăng phủ, cách Thăng\r\nLong gần hai trăm dặm.\r\nRặng núi nơi họ dừng chân gần như chẳng có bóng người, quanh\r\nnăm thời tiết lạnh lẽo, sương mù giăng khắp nơi, thú dữ thường\r\nxuyên qua lại. Đám cướp quyết định dừng lại nơi đây, an cư lạc\r\nnghiệp, dựng nhà dựng cửa, dùng dao phạt bớt cây cối, đào một cái\r\nhố để hứng nước mưa, tìm kế sống qua ngày. Họ thành lập một ngôi\r\nlàng nho nhỏ với vỏn vẹn hơn chục nhân khẩu, sống quây quần bên\r\nnhau để xa lánh người đời.\r\nBất cứ ngôi làng nào ở nước Việt cũng đều có tên, thế nhưng\r\nngôi làng nhỏ đìu hiu nằm sâu trong rừng thì đến cái cổng làng cũng\r\nchẳng có, huống chi là đặt một cái tên đúng nghĩa. Để đến được\r\nngôi làng này, người ta phải đi năm vạn bước chân và trèo hàng\r\nchục dốc núi. Con đường mòn từ cửa rừng đi đến gần ngôi làng dài\r\nheo hút, càng vào sâu lối đi càng chật hẹp. Đi sâu vào rừng là\r\nđường lên núi, dốc núi dựng đứng, cứ khoảng vài chục bước chân\r\nlà đến một con dốc.',1,1,NULL,NULL),(5,'Chương 2:','Thương em, anh cũng muốn vô\r\nSợ truông nhà Hồ, sợ phá Tam Giang\r\nPhá Tam Giang ngày rày đã cạn\r\nTruông nhà Hồ, nội tán cấm nghiêm.\r\nCho đến tận bây giờ, nhiều người dân ở miền Trung nắng gió vẫn\r\ncòn thuộc lòng những câu thơ ấy. Nghe qua có vẻ đơn giản, nhưng\r\nchẳng mấy ai biết được rằng đằng sau những câu thơ đó lại ẩn\r\nchứa khoảng ký ức về một thời kỳ kinh hoàng.\r\nTruông nhà Hồ trước đây vốn nằm tiếp giáp với hai châu Địa Lý\r\nvà Minh Linh, nay thuộc địa phận tỉnh Quảng Trị và Quảng Bình.\r\nThuở trước, nơi đây vốn là một vùng đất hoang vu hẻo lánh, cây cối\r\nbạt ngàn, cỏ mọc cao quá đầu người. Nhắc đến truông nhà Hồ,\r\nngười dân quanh vùng đều run rẩy sợ hãi. Cái họ sợ không phải là\r\nbãi đất hoang sơ, cỏ mọc um tùm nhiều rắn rết. Thứ làm cho họ\r\nkhiếp đảm thực sự chính là sào huyệt của một băng cướp nguy\r\nhiểm, dân gian quen gọi với danh từ thảo khấu.\r\nCâu chuyện xảy ra vào thời chúa Nguyễn ở Đàng Trong, khi ấy\r\ntruông nhà Hồ nổi lên như một địa danh khét tiếng. Hễ cứ ai đi qua\r\nđó thường bị bọn cướp bắt bớ, giết chóc, trấn lột của cải, đòi tiền\r\nmãi lộ. Một ngày nọ, có gia đình buôn tơ lụa người miền ngược đi\r\nngang qua, nhân khẩu cũng phải lên đến hơn trăm người đều bị bọn\r\ncướp giết sạch, rồi tẩu tán đồng tơ lụa đi khắp nơi.\r\nNgười ta kể lại rằng, hơn trăm mạng người của gia đình buôn tơ\r\nlụa bị giết hại một cách dã man, người bị chém lìa đầu, người bị\r\nđâm thấu tim, lại có người bị đâm lòi bụng. Sau cơn giết người tàn\r\nbạo ấy, máu nhuộm đỏ cả đất, đứng cách xa mấy dặm đường vẫn\r\ncòn ngửi thoang thoảng mùi máu tanh. Đám cướp cạn chém giết\r\ngần hết gia tộc nọ, nhưng nghe đâu còn sót lại người vợ đang mang\r\nbầu của ông chủ buôn tơ. Không ai có thể hiểu nổi làm thế nào mà\r\nmột người đàn bà bụng mang dạ chửa lại có thể trốn thoát. Dân\r\ntrong vùng suy đoán, có thể thị đã lẩn trốn vào đám lau sậy um tùm,\r\nrồi ẩn nấp ở đó chờ đám cướp rút lui mới tìm đường thoát. Chẳng rõ\r\nngười đàn bà bụng chửa ấy đã đi đâu, cứ như thể thị đã tan biến\r\nkhỏi mặt đất.\r\nTừ sau vụ cướp đẫm máu ấy, danh tiếng của truông nhà Hồ cứ\r\nnhư thế lớn dần, không còn ai dám qua lại nơi đó nữa. Phần vì sợ\r\ncướp, phần vì lời đồn đại những bóng ma màu trắng toát bay phất\r\nphơ qua lại trên ngọn cây, mặt nước vào những đêm mưa gió. Dân\r\ntrong vùng bảo rằng đó là oan hồn của đại gia đình buôn tơ lụa bị\r\nbọn cướp giết ngày nào.\r\nLúc bấy giờ có một vị quan nội tán triều Nguyễn tên là Nguyễn\r\nKhoa Đăng, nổi tiếng thông minh, tài giỏi. Quan nội tán biết được\r\nmối lo sợ của dân chúng, ông bèn tìm cách dẹp tan băng cướp lộng\r\nhành. Đêm hôm ấy, trời tối như hũ nút, không có ánh trăng soi chiếu\r\nnhư mọi khi, quan cho xe chở lúa và hàng hóa chạy qua truông.\r\nTrong xe, ông bố trí một người lính ngồi trong thùng và rải lúa ra dọc\r\nđường. Nhờ có dấu lúa rải này mà quan nội tán tìm được sào huyệt\r\ncủa bọn cướp, quan quân triều đình tràn vào bắt gọn. Bọn cướp\r\ntháo chạy, nhưng đa phần bị quân triều đình bắt giữ giải về kinh chịu\r\ntội. Băng cướp tan rã, cái họa truông nhà Hồ cũng chẳng còn, từ đó\r\ndân chúng qua lại truông được yên bình.\r\nĐám cướp tan rã, chỉ còn hơn chục người còn lại kịp chạy thoát\r\nthân. Những người ấy không phải là kẻ đầu sỏ, mà chỉ là những tên\r\nsai vặt. Đám người ấy có già, có trẻ, có trai, có gái, họ chạy thoát\r\nnhờ chui vào giếng, trốn vào bụi cây um tùm nhằm tránh khỏi sự\r\ntruy bắt của quan quân triều đình.\r\nSào huyệt để ẩn náu không còn, mọi thứ vũ khí, của cải cướp\r\nđược đều bị thu giữ, hơn mười người còn sót lại quyết định di\r\nchuyển về thành Thăng Long. Người ta không thể lý giải vì sao mà\r\ntàn dư của băng cướp có thể vượt quãng đường dài đằng đẵng từ\r\ntruông nhà Hồ đến tận kinh thành. Chỉ biết rằng khi đám người đi\r\nđến kinh thành thì gần như kiệt sức. Dân trong thành thấy diện mạo\r\ncủa họ có phần lạ kỳ, mái tóc bạc phơ, quần áo rách rưới, cả người\r\ntoát ra vẻ lạnh lẽo u ám như vừa từ dưới âm ty địa ngục chui lên,\r\nbèn ra sức xua đuổi.\r\nSống giữa chốn phố thị không được, họ đành di chuyến về một\r\nvùng đất hoang vu, quanh năm mây mù giăng phủ, cách Thăng\r\nLong gần hai trăm dặm.\r\nRặng núi nơi họ dừng chân gần như chẳng có bóng người, quanh\r\nnăm thời tiết lạnh lẽo, sương mù giăng khắp nơi, thú dữ thường\r\nxuyên qua lại. Đám cướp quyết định dừng lại nơi đây, an cư lạc\r\nnghiệp, dựng nhà dựng cửa, dùng dao phạt bớt cây cối, đào một cái\r\nhố để hứng nước mưa, tìm kế sống qua ngày. Họ thành lập một ngôi\r\nlàng nho nhỏ với vỏn vẹn hơn chục nhân khẩu, sống quây quần bên\r\nnhau để xa lánh người đời.\r\nBất cứ ngôi làng nào ở nước Việt cũng đều có tên, thế nhưng\r\nngôi làng nhỏ đìu hiu nằm sâu trong rừng thì đến cái cổng làng cũng\r\nchẳng có, huống chi là đặt một cái tên đúng nghĩa. Để đến được\r\nngôi làng này, người ta phải đi năm vạn bước chân và trèo hàng\r\nchục dốc núi. Con đường mòn từ cửa rừng đi đến gần ngôi làng dài\r\nheo hút, càng vào sâu lối đi càng chật hẹp. Đi sâu vào rừng là\r\nđường lên núi, dốc núi dựng đứng, cứ khoảng vài chục bước chân\r\nlà đến một con dốc.',2,1,NULL,NULL),(6,'Chương 1:','Thương em, anh cũng muốn vô\r\nSợ truông nhà Hồ, sợ phá Tam Giang\r\nPhá Tam Giang ngày rày đã cạn\r\nTruông nhà Hồ, nội tán cấm nghiêm.\r\nCho đến tận bây giờ, nhiều người dân ở miền Trung nắng gió vẫn\r\ncòn thuộc lòng những câu thơ ấy. Nghe qua có vẻ đơn giản, nhưng\r\nchẳng mấy ai biết được rằng đằng sau những câu thơ đó lại ẩn\r\nchứa khoảng ký ức về một thời kỳ kinh hoàng.\r\nTruông nhà Hồ trước đây vốn nằm tiếp giáp với hai châu Địa Lý\r\nvà Minh Linh, nay thuộc địa phận tỉnh Quảng Trị và Quảng Bình.\r\nThuở trước, nơi đây vốn là một vùng đất hoang vu hẻo lánh, cây cối\r\nbạt ngàn, cỏ mọc cao quá đầu người. Nhắc đến truông nhà Hồ,\r\nngười dân quanh vùng đều run rẩy sợ hãi. Cái họ sợ không phải là\r\nbãi đất hoang sơ, cỏ mọc um tùm nhiều rắn rết. Thứ làm cho họ\r\nkhiếp đảm thực sự chính là sào huyệt của một băng cướp nguy\r\nhiểm, dân gian quen gọi với danh từ thảo khấu.\r\nCâu chuyện xảy ra vào thời chúa Nguyễn ở Đàng Trong, khi ấy\r\ntruông nhà Hồ nổi lên như một địa danh khét tiếng. Hễ cứ ai đi qua\r\nđó thường bị bọn cướp bắt bớ, giết chóc, trấn lột của cải, đòi tiền\r\nmãi lộ. Một ngày nọ, có gia đình buôn tơ lụa người miền ngược đi\r\nngang qua, nhân khẩu cũng phải lên đến hơn trăm người đều bị bọn\r\ncướp giết sạch, rồi tẩu tán đồng tơ lụa đi khắp nơi.\r\nNgười ta kể lại rằng, hơn trăm mạng người của gia đình buôn tơ\r\nlụa bị giết hại một cách dã man, người bị chém lìa đầu, người bị\r\nđâm thấu tim, lại có người bị đâm lòi bụng. Sau cơn giết người tàn\r\nbạo ấy, máu nhuộm đỏ cả đất, đứng cách xa mấy dặm đường vẫn\r\ncòn ngửi thoang thoảng mùi máu tanh. Đám cướp cạn chém giết\r\ngần hết gia tộc nọ, nhưng nghe đâu còn sót lại người vợ đang mang\r\nbầu của ông chủ buôn tơ. Không ai có thể hiểu nổi làm thế nào mà\r\nmột người đàn bà bụng mang dạ chửa lại có thể trốn thoát. Dân\r\ntrong vùng suy đoán, có thể thị đã lẩn trốn vào đám lau sậy um tùm,\r\nrồi ẩn nấp ở đó chờ đám cướp rút lui mới tìm đường thoát. Chẳng rõ\r\nngười đàn bà bụng chửa ấy đã đi đâu, cứ như thể thị đã tan biến\r\nkhỏi mặt đất.\r\nTừ sau vụ cướp đẫm máu ấy, danh tiếng của truông nhà Hồ cứ\r\nnhư thế lớn dần, không còn ai dám qua lại nơi đó nữa. Phần vì sợ\r\ncướp, phần vì lời đồn đại những bóng ma màu trắng toát bay phất\r\nphơ qua lại trên ngọn cây, mặt nước vào những đêm mưa gió. Dân\r\ntrong vùng bảo rằng đó là oan hồn của đại gia đình buôn tơ lụa bị\r\nbọn cướp giết ngày nào.\r\nLúc bấy giờ có một vị quan nội tán triều Nguyễn tên là Nguyễn\r\nKhoa Đăng, nổi tiếng thông minh, tài giỏi. Quan nội tán biết được\r\nmối lo sợ của dân chúng, ông bèn tìm cách dẹp tan băng cướp lộng\r\nhành. Đêm hôm ấy, trời tối như hũ nút, không có ánh trăng soi chiếu\r\nnhư mọi khi, quan cho xe chở lúa và hàng hóa chạy qua truông.\r\nTrong xe, ông bố trí một người lính ngồi trong thùng và rải lúa ra dọc\r\nđường. Nhờ có dấu lúa rải này mà quan nội tán tìm được sào huyệt\r\ncủa bọn cướp, quan quân triều đình tràn vào bắt gọn. Bọn cướp\r\ntháo chạy, nhưng đa phần bị quân triều đình bắt giữ giải về kinh chịu\r\ntội. Băng cướp tan rã, cái họa truông nhà Hồ cũng chẳng còn, từ đó\r\ndân chúng qua lại truông được yên bình.\r\nĐám cướp tan rã, chỉ còn hơn chục người còn lại kịp chạy thoát\r\nthân. Những người ấy không phải là kẻ đầu sỏ, mà chỉ là những tên\r\nsai vặt. Đám người ấy có già, có trẻ, có trai, có gái, họ chạy thoát\r\nnhờ chui vào giếng, trốn vào bụi cây um tùm nhằm tránh khỏi sự\r\ntruy bắt của quan quân triều đình.\r\nSào huyệt để ẩn náu không còn, mọi thứ vũ khí, của cải cướp\r\nđược đều bị thu giữ, hơn mười người còn sót lại quyết định di\r\nchuyển về thành Thăng Long. Người ta không thể lý giải vì sao mà\r\ntàn dư của băng cướp có thể vượt quãng đường dài đằng đẵng từ\r\ntruông nhà Hồ đến tận kinh thành. Chỉ biết rằng khi đám người đi\r\nđến kinh thành thì gần như kiệt sức. Dân trong thành thấy diện mạo\r\ncủa họ có phần lạ kỳ, mái tóc bạc phơ, quần áo rách rưới, cả người\r\ntoát ra vẻ lạnh lẽo u ám như vừa từ dưới âm ty địa ngục chui lên,\r\nbèn ra sức xua đuổi.\r\nSống giữa chốn phố thị không được, họ đành di chuyến về một\r\nvùng đất hoang vu, quanh năm mây mù giăng phủ, cách Thăng\r\nLong gần hai trăm dặm.\r\nRặng núi nơi họ dừng chân gần như chẳng có bóng người, quanh\r\nnăm thời tiết lạnh lẽo, sương mù giăng khắp nơi, thú dữ thường\r\nxuyên qua lại. Đám cướp quyết định dừng lại nơi đây, an cư lạc\r\nnghiệp, dựng nhà dựng cửa, dùng dao phạt bớt cây cối, đào một cái\r\nhố để hứng nước mưa, tìm kế sống qua ngày. Họ thành lập một ngôi\r\nlàng nho nhỏ với vỏn vẹn hơn chục nhân khẩu, sống quây quần bên\r\nnhau để xa lánh người đời.\r\nBất cứ ngôi làng nào ở nước Việt cũng đều có tên, thế nhưng\r\nngôi làng nhỏ đìu hiu nằm sâu trong rừng thì đến cái cổng làng cũng\r\nchẳng có, huống chi là đặt một cái tên đúng nghĩa. Để đến được\r\nngôi làng này, người ta phải đi năm vạn bước chân và trèo hàng\r\nchục dốc núi. Con đường mòn từ cửa rừng đi đến gần ngôi làng dài\r\nheo hút, càng vào sâu lối đi càng chật hẹp. Đi sâu vào rừng là\r\nđường lên núi, dốc núi dựng đứng, cứ khoảng vài chục bước chân\r\nlà đến một con dốc.',1,NULL,1014,NULL),(7,'Chương 2:','Thương em, anh cũng muốn vô\r\nSợ truông nhà Hồ, sợ phá Tam Giang\r\nPhá Tam Giang ngày rày đã cạn\r\nTruông nhà Hồ, nội tán cấm nghiêm.\r\nCho đến tận bây giờ, nhiều người dân ở miền Trung nắng gió vẫn\r\ncòn thuộc lòng những câu thơ ấy. Nghe qua có vẻ đơn giản, nhưng\r\nchẳng mấy ai biết được rằng đằng sau những câu thơ đó lại ẩn\r\nchứa khoảng ký ức về một thời kỳ kinh hoàng.\r\nTruông nhà Hồ trước đây vốn nằm tiếp giáp với hai châu Địa Lý\r\nvà Minh Linh, nay thuộc địa phận tỉnh Quảng Trị và Quảng Bình.\r\nThuở trước, nơi đây vốn là một vùng đất hoang vu hẻo lánh, cây cối\r\nbạt ngàn, cỏ mọc cao quá đầu người. Nhắc đến truông nhà Hồ,\r\nngười dân quanh vùng đều run rẩy sợ hãi. Cái họ sợ không phải là\r\nbãi đất hoang sơ, cỏ mọc um tùm nhiều rắn rết. Thứ làm cho họ\r\nkhiếp đảm thực sự chính là sào huyệt của một băng cướp nguy\r\nhiểm, dân gian quen gọi với danh từ thảo khấu.\r\nCâu chuyện xảy ra vào thời chúa Nguyễn ở Đàng Trong, khi ấy\r\ntruông nhà Hồ nổi lên như một địa danh khét tiếng. Hễ cứ ai đi qua\r\nđó thường bị bọn cướp bắt bớ, giết chóc, trấn lột của cải, đòi tiền\r\nmãi lộ. Một ngày nọ, có gia đình buôn tơ lụa người miền ngược đi\r\nngang qua, nhân khẩu cũng phải lên đến hơn trăm người đều bị bọn\r\ncướp giết sạch, rồi tẩu tán đồng tơ lụa đi khắp nơi.\r\nNgười ta kể lại rằng, hơn trăm mạng người của gia đình buôn tơ\r\nlụa bị giết hại một cách dã man, người bị chém lìa đầu, người bị\r\nđâm thấu tim, lại có người bị đâm lòi bụng. Sau cơn giết người tàn\r\nbạo ấy, máu nhuộm đỏ cả đất, đứng cách xa mấy dặm đường vẫn\r\ncòn ngửi thoang thoảng mùi máu tanh. Đám cướp cạn chém giết\r\ngần hết gia tộc nọ, nhưng nghe đâu còn sót lại người vợ đang mang\r\nbầu của ông chủ buôn tơ. Không ai có thể hiểu nổi làm thế nào mà\r\nmột người đàn bà bụng mang dạ chửa lại có thể trốn thoát. Dân\r\ntrong vùng suy đoán, có thể thị đã lẩn trốn vào đám lau sậy um tùm,\r\nrồi ẩn nấp ở đó chờ đám cướp rút lui mới tìm đường thoát. Chẳng rõ\r\nngười đàn bà bụng chửa ấy đã đi đâu, cứ như thể thị đã tan biến\r\nkhỏi mặt đất.\r\nTừ sau vụ cướp đẫm máu ấy, danh tiếng của truông nhà Hồ cứ\r\nnhư thế lớn dần, không còn ai dám qua lại nơi đó nữa. Phần vì sợ\r\ncướp, phần vì lời đồn đại những bóng ma màu trắng toát bay phất\r\nphơ qua lại trên ngọn cây, mặt nước vào những đêm mưa gió. Dân\r\ntrong vùng bảo rằng đó là oan hồn của đại gia đình buôn tơ lụa bị\r\nbọn cướp giết ngày nào.\r\nLúc bấy giờ có một vị quan nội tán triều Nguyễn tên là Nguyễn\r\nKhoa Đăng, nổi tiếng thông minh, tài giỏi. Quan nội tán biết được\r\nmối lo sợ của dân chúng, ông bèn tìm cách dẹp tan băng cướp lộng\r\nhành. Đêm hôm ấy, trời tối như hũ nút, không có ánh trăng soi chiếu\r\nnhư mọi khi, quan cho xe chở lúa và hàng hóa chạy qua truông.\r\nTrong xe, ông bố trí một người lính ngồi trong thùng và rải lúa ra dọc\r\nđường. Nhờ có dấu lúa rải này mà quan nội tán tìm được sào huyệt\r\ncủa bọn cướp, quan quân triều đình tràn vào bắt gọn. Bọn cướp\r\ntháo chạy, nhưng đa phần bị quân triều đình bắt giữ giải về kinh chịu\r\ntội. Băng cướp tan rã, cái họa truông nhà Hồ cũng chẳng còn, từ đó\r\ndân chúng qua lại truông được yên bình.\r\nĐám cướp tan rã, chỉ còn hơn chục người còn lại kịp chạy thoát\r\nthân. Những người ấy không phải là kẻ đầu sỏ, mà chỉ là những tên\r\nsai vặt. Đám người ấy có già, có trẻ, có trai, có gái, họ chạy thoát\r\nnhờ chui vào giếng, trốn vào bụi cây um tùm nhằm tránh khỏi sự\r\ntruy bắt của quan quân triều đình.\r\nSào huyệt để ẩn náu không còn, mọi thứ vũ khí, của cải cướp\r\nđược đều bị thu giữ, hơn mười người còn sót lại quyết định di\r\nchuyển về thành Thăng Long. Người ta không thể lý giải vì sao mà\r\ntàn dư của băng cướp có thể vượt quãng đường dài đằng đẵng từ\r\ntruông nhà Hồ đến tận kinh thành. Chỉ biết rằng khi đám người đi\r\nđến kinh thành thì gần như kiệt sức. Dân trong thành thấy diện mạo\r\ncủa họ có phần lạ kỳ, mái tóc bạc phơ, quần áo rách rưới, cả người\r\ntoát ra vẻ lạnh lẽo u ám như vừa từ dưới âm ty địa ngục chui lên,\r\nbèn ra sức xua đuổi.\r\nSống giữa chốn phố thị không được, họ đành di chuyến về một\r\nvùng đất hoang vu, quanh năm mây mù giăng phủ, cách Thăng\r\nLong gần hai trăm dặm.\r\nRặng núi nơi họ dừng chân gần như chẳng có bóng người, quanh\r\nnăm thời tiết lạnh lẽo, sương mù giăng khắp nơi, thú dữ thường\r\nxuyên qua lại. Đám cướp quyết định dừng lại nơi đây, an cư lạc\r\nnghiệp, dựng nhà dựng cửa, dùng dao phạt bớt cây cối, đào một cái\r\nhố để hứng nước mưa, tìm kế sống qua ngày. Họ thành lập một ngôi\r\nlàng nho nhỏ với vỏn vẹn hơn chục nhân khẩu, sống quây quần bên\r\nnhau để xa lánh người đời.\r\nBất cứ ngôi làng nào ở nước Việt cũng đều có tên, thế nhưng\r\nngôi làng nhỏ đìu hiu nằm sâu trong rừng thì đến cái cổng làng cũng\r\nchẳng có, huống chi là đặt một cái tên đúng nghĩa. Để đến được\r\nngôi làng này, người ta phải đi năm vạn bước chân và trèo hàng\r\nchục dốc núi. Con đường mòn từ cửa rừng đi đến gần ngôi làng dài\r\nheo hút, càng vào sâu lối đi càng chật hẹp. Đi sâu vào rừng là\r\nđường lên núi, dốc núi dựng đứng, cứ khoảng vài chục bước chân\r\nlà đến một con dốc.',2,NULL,1014,NULL);
/*!40000 ALTER TABLE `chuong_sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhgia_nhanxet`
--

DROP TABLE IF EXISTS `danhgia_nhanxet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhgia_nhanxet` (
  `MaDG` int NOT NULL AUTO_INCREMENT,
  `sach_id` int DEFAULT NULL,
  `nguoi_dung_id` int DEFAULT NULL,
  `NhanXet` text,
  `DanhGia` int NOT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sach_soi_id` int DEFAULT NULL,
  `sach_tomtat_id` int DEFAULT NULL,
  `sach_noi_id` int DEFAULT NULL,
  PRIMARY KEY (`MaDG`),
  KEY `sach_noi_id` (`sach_noi_id`),
  KEY `sach_tomtat_id` (`sach_tomtat_id`),
  KEY `sach_soi_id` (`sach_soi_id`),
  KEY `sach_id` (`sach_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  CONSTRAINT `danhgia_nhanxet_ibfk_1` FOREIGN KEY (`sach_noi_id`) REFERENCES `sach_noi` (`MaSach`),
  CONSTRAINT `danhgia_nhanxet_ibfk_2` FOREIGN KEY (`sach_tomtat_id`) REFERENCES `sach_tomtat` (`MaSach`),
  CONSTRAINT `danhgia_nhanxet_ibfk_3` FOREIGN KEY (`sach_soi_id`) REFERENCES `sach_soi` (`MaSach`),
  CONSTRAINT `danhgia_nhanxet_ibfk_4` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`),
  CONSTRAINT `danhgia_nhanxet_ibfk_5` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `khach_hang` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhgia_nhanxet`
--

LOCK TABLES `danhgia_nhanxet` WRITE;
/*!40000 ALTER TABLE `danhgia_nhanxet` DISABLE KEYS */;
INSERT INTO `danhgia_nhanxet` VALUES (1,NULL,2,'ad',4,'2024-04-07 06:21:41',1014,NULL,NULL),(2,1,2,'ád',3,'2024-04-07 06:37:16',NULL,NULL,NULL),(3,1,2,'ádád',3,'2024-04-07 06:37:34',NULL,NULL,NULL),(9,NULL,2,'e',2,'2024-04-07 07:04:23',NULL,NULL,574),(10,NULL,2,'gggg',1,'2024-04-07 07:06:46',NULL,NULL,574),(11,NULL,2,'hay',4,'2024-04-07 07:10:22',NULL,NULL,574),(12,NULL,2,'ád',3,'2024-04-07 07:11:36',NULL,NULL,574),(13,NULL,2,'ggggggg',3,'2024-04-07 07:12:29',NULL,NULL,574),(14,1,2,'adddđ',3,'2024-04-07 07:12:43',NULL,NULL,NULL),(15,NULL,2,'SÂ',4,'2024-04-07 07:18:29',1014,NULL,NULL),(16,NULL,2,'aaaaaaaaaaaaaaa',4,'2024-04-07 07:18:40',NULL,NULL,574),(17,1,1,'ads',5,'2024-04-09 03:16:08',NULL,NULL,NULL);
/*!40000 ALTER TABLE `danhgia_nhanxet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `MaDM` int NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(255) NOT NULL,
  `MoTa` text,
  PRIMARY KEY (`MaDM`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (23,'Trinh thám - Kinh dị',''),(24,' Marketing - Bán hàng',''),(25,'Tài chính cá nhân',''),(26,'Phát triển cá nhân',''),(27,'Học tập - Hướng nghiệp',''),(28,'Sức khỏe - Làm đẹp',''),(29,'Tư duy sáng tạo',''),(30,'Chứng khoán - Bất động sản - Đầu tư',''),(31,'Địa lý du lịch',''),(32,' Nghệ thuật sống',''),(33,'Tâm linh phương Đông',''),(34,'Tâm linh phương Tây',''),(35,'Kinh doanh - Làm giàu',''),(36,'Ngôn tình',''),(37,' Tác phẩm kinh điển',''),(38,'Quản trị - Lãnh đạo',''),(39,'Truyện',''),(40,'Giáo dục - Sách thiếu nhi',''),(41,'Sức khỏe tinh thần',''),(42,'Khoa học - Công nghệ',''),(43,'Tiểu thuyết',''),(44,'Tâm Lý - Sức Khỏe Tinh Thần','');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc_podcast`
--

DROP TABLE IF EXISTS `danhmuc_podcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc_podcast` (
  `MaDM` int NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(255) NOT NULL,
  `MoTa` text,
  PRIMARY KEY (`MaDM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc_podcast`
--

LOCK TABLES `danhmuc_podcast` WRITE;
/*!40000 ALTER TABLE `danhmuc_podcast` DISABLE KEYS */;
/*!40000 ALTER TABLE `danhmuc_podcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc_sachsoi`
--

DROP TABLE IF EXISTS `danhmuc_sachsoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc_sachsoi` (
  `MaDM` int NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(255) NOT NULL,
  `MoTa` text,
  PRIMARY KEY (`MaDM`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc_sachsoi`
--

LOCK TABLES `danhmuc_sachsoi` WRITE;
/*!40000 ALTER TABLE `danhmuc_sachsoi` DISABLE KEYS */;
INSERT INTO `danhmuc_sachsoi` VALUES (6,'Hiện đại',''),(7,'Cổ đại',''),(8,'Huyền huyễn',''),(9,' Trinh thám',''),(10,'Đam mỹ','');
/*!40000 ALTER TABLE `danhmuc_sachsoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoi_vien`
--

DROP TABLE IF EXISTS `hoi_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoi_vien` (
  `MaHV` int NOT NULL AUTO_INCREMENT,
  `nguoi_dung_id` int DEFAULT NULL,
  `LoaiHoiVien` varchar(50) DEFAULT NULL,
  `NgayThamGia` date DEFAULT NULL,
  `NgayHetHan` date DEFAULT NULL,
  `ThoiGianMua` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaHV`),
  UNIQUE KEY `nguoi_dung_id` (`nguoi_dung_id`),
  CONSTRAINT `hoi_vien_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `khach_hang` (`MaKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoi_vien`
--

LOCK TABLES `hoi_vien` WRITE;
/*!40000 ALTER TABLE `hoi_vien` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoi_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khach_hang` (
  `MaKH` int NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(50) NOT NULL,
  `MatKhau` varchar(250) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SoDienThoai` varchar(25) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `KichHoat` tinyint(1) DEFAULT '0',
  `VaiTro` varchar(50) DEFAULT 'customer',
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  PRIMARY KEY (`MaKH`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
INSERT INTO `khach_hang` VALUES (1,'phamngoctam','$2y$10$15qUwylXmSVGVaUZ7hKB6u/3WAXhigTkVglGG9Jh1suo2VIb3on0C','tam@gmail.com','0822561955','uploads/6614b7201a417.jpg',0,'customer','Khac','2024-04-11'),(2,'quantri','2bf3cb5b3cf34ea90006027fbe055c740b5168ad43da74f9bde396df289cc2ec','ngoctampksv@gmail.com','0822561955','',0,'admin',NULL,NULL),(4,'quantri','tam113','ngoctam@gmail.com','0822561955','',0,'admin',NULL,NULL),(998,'tâmdmin','a529a6b576e05a163b33f0e24398724ef93ddf0117e83812513159c091ae27e9','ngoctam113@gmail.com','0822561955','',0,'admin',NULL,NULL),(1000,'adbad','$2y$10$/F2.mkRvF/uXH8Ravb4iWOsLFFZ.rrrWP.eR1J1G2ZLiT3kGywuOi','tam113tt@gmail.com','',NULL,0,'customer',NULL,NULL),(1001,'pham ngoc tam','$2y$10$3uIGuKyfvfuv.O5JPbChSu5wrfnbh56KXb5Hibe4y3ibdID4KGxdi','tam1113@gmail.com','0822561955',NULL,0,'customer',NULL,NULL),(1002,'tam113pksv','$2y$10$AMone3nwbpB.QMup9Nu4yeyvEtk4yWaAGtMfnk62SsHNwE1FunQSu','tampk@gmail.com','0822561955','uploads/660fa33c5a7b6.jpg',0,'customer','Nam','2003-01-21'),(1003,'Ngọc Tâm','$2y$10$G8aEcWGzsLR09v1wm7i.Je7aNgrwvUqYkekaST0Unrv6g.JgLvRRq','tampk1@gmail.com','0822561955',NULL,0,'customer',NULL,NULL),(1004,'ninh','$2y$10$jEaKiQwPvd7w6E9DQf8OqexyUpBgI529ai0C8flFYGi8M5l9vYeMy','ninhhk@gmail.com','0899866516',NULL,0,'customer',NULL,NULL),(1005,'Phạm Ngọc Tâm','$2y$10$KOdpbhzDuyiFOIDMyauDIOdgntVRR0.Vz2YcrUcmZYIA/1YcFl0aW','tamppks@gmail.com','0822561955','uploads/6610d91bdd720.jpg',0,'customer','Nam','2003-01-21'),(1006,'phamngoctam','$2y$10$euISZe/7b.7ln4Vw7Pywt.zRzSMZzh6xcsQow8...kRdAYAC56CFS','tam111@gmail.com','0822561955',NULL,0,'customer',NULL,NULL);
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lich_su`
--

DROP TABLE IF EXISTS `lich_su`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lich_su` (
  `MaLichSu` int NOT NULL AUTO_INCREMENT,
  `nguoi_dung_id` int DEFAULT NULL,
  `sach_id` int DEFAULT NULL,
  `sach_noi_id` int DEFAULT NULL,
  `audio_id` int DEFAULT NULL,
  `sach_soi_id` int DEFAULT NULL,
  `chuong_id` int DEFAULT NULL,
  PRIMARY KEY (`MaLichSu`),
  KEY `sach_noi_id` (`sach_noi_id`),
  KEY `sach_soi_id` (`sach_soi_id`),
  KEY `audio_id` (`audio_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `sach_id` (`sach_id`),
  KEY `chuong_id` (`chuong_id`),
  CONSTRAINT `lich_su_ibfk_1` FOREIGN KEY (`sach_noi_id`) REFERENCES `sach_noi` (`MaSach`),
  CONSTRAINT `lich_su_ibfk_2` FOREIGN KEY (`sach_soi_id`) REFERENCES `sach_soi` (`MaSach`),
  CONSTRAINT `lich_su_ibfk_3` FOREIGN KEY (`audio_id`) REFERENCES `audiofiles` (`MaAudio`),
  CONSTRAINT `lich_su_ibfk_4` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `khach_hang` (`MaKH`),
  CONSTRAINT `lich_su_ibfk_5` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`),
  CONSTRAINT `lich_su_ibfk_6` FOREIGN KEY (`chuong_id`) REFERENCES `chuong_sach` (`MaChuong`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lich_su`
--

LOCK TABLES `lich_su` WRITE;
/*!40000 ALTER TABLE `lich_su` DISABLE KEYS */;
INSERT INTO `lich_su` VALUES (31,1006,1,NULL,NULL,NULL,4);
/*!40000 ALTER TABLE `lich_su` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luot_xem`
--

DROP TABLE IF EXISTS `luot_xem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `luot_xem` (
  `MaLuotXem` int NOT NULL AUTO_INCREMENT,
  `sach_id` int DEFAULT NULL,
  `sach_tomtat_id` int DEFAULT NULL,
  `sach_soi_id` int DEFAULT NULL,
  `audio_id` int DEFAULT NULL,
  `SoLuotXem` int DEFAULT '0',
  PRIMARY KEY (`MaLuotXem`),
  KEY `sach_tomtat_id` (`sach_tomtat_id`),
  KEY `sach_soi_id` (`sach_soi_id`),
  KEY `sach_id` (`sach_id`),
  KEY `audio_id` (`audio_id`),
  CONSTRAINT `luot_xem_ibfk_1` FOREIGN KEY (`sach_tomtat_id`) REFERENCES `sach_tomtat` (`MaSach`),
  CONSTRAINT `luot_xem_ibfk_2` FOREIGN KEY (`sach_soi_id`) REFERENCES `sach_soi` (`MaSach`),
  CONSTRAINT `luot_xem_ibfk_3` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`),
  CONSTRAINT `luot_xem_ibfk_4` FOREIGN KEY (`audio_id`) REFERENCES `audiofiles` (`MaAudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luot_xem`
--

LOCK TABLES `luot_xem` WRITE;
/*!40000 ALTER TABLE `luot_xem` DISABLE KEYS */;
/*!40000 ALTER TABLE `luot_xem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podcast`
--

DROP TABLE IF EXISTS `podcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `podcast` (
  `MaPodcast` int NOT NULL AUTO_INCREMENT,
  `TenPodcast` varchar(225) NOT NULL,
  `Podcast_url` text NOT NULL,
  `HinhAnhBia` varchar(225) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaPodcast`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc_podcast` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `podcast_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podcast`
--

LOCK TABLES `podcast` WRITE;
/*!40000 ALTER TABLE `podcast` DISABLE KEYS */;
/*!40000 ALTER TABLE `podcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach` (
  `MaSach` int NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `HinhAnhBia` varchar(255) DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LoaiSach` varchar(255) NOT NULL,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  PRIMARY KEY (`MaSach`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES (1,'Bí ẩn Sun Down','Simone St. James','Năm 1982, Viv Delaney - một cô gái 20 tuổi - bị mất tích tại nhà nghỉ Sundown đúng vào lúc trên sóng truyền hình đang đưa tin về những vụ án mạng mà nạn nhân là những cô gái trẻ, những người được tìm thấy trong trạng thái không mảnh vải che thân. Vụ mất tích của Viv chìm vào quên lãng do không có một manh mối gì, cũng như những người trong gia đình cô bày tỏ một sự thờ ơ đến kì lạ và có chút gì đó chấp nhận. Năm 2017, cháu của Viv là Carly, khi ấy cũng là một cô gái 20 tuổi, không chấp nhận sự mất tích của bác mình lại chìm vào quên lãng như vậy, quyết định lên đường đến nhà nghỉ Sundown để giải mã bí mật. Tại đây, cô đã gặp những hiện tượng hết sức kì lạ và từng bước lần theo đó để giải mã bí ẩn này. Thông tin tác giả Simone ST. James Là tác giả ăn khách nhất với Bí ẩn Sun Down. Bà là chủ nhân của hai giải thương RITA từ Romace Writers of America và giải Arthur Ellis từ Crime Writers of Canada. Bà đã viết tiểu thuyết kinh dị đầu tiên của mình khi đang học trung học và dành hai năm trong lĩnh vực truyền hình trước khi toàn tâm toàn ý vào sự nghiệp xuất bản.\r\n\r\nWaka xin trân trọng giới thiệu Bí ẩn Sun Down - Simone St. James!','2024-03-12','sach_dientu/uploads/42338.jpg','2024-03-30 08:04:42','MienPhi',23,NULL);
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach_noi`
--

DROP TABLE IF EXISTS `sach_noi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach_noi` (
  `MaSach` int NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(225) NOT NULL,
  `Sach_url` text NOT NULL,
  `HinhAnhBia` varchar(225) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaSach`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `sach_noi_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `sach_noi_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=575 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach_noi`
--

LOCK TABLES `sach_noi` WRITE;
/*!40000 ALTER TABLE `sach_noi` DISABLE KEYS */;
INSERT INTO `sach_noi` VALUES (574,'Cách biến khả năng của bạn thành tiền','audio/uploads/audio-66123a630ec7c9.32755227.mp3','audio/uploads/899.jpg','Cuốn sách “Cách Biến Khả Năng Của Bạn Thành Tiền” của tác giả Earl Prevette sẽ cho bạn biết hãy quyết định ngay bây giờ để có thể làm chủ công việc, khả năng, những suy nghĩ lạc quan, những hành động và là người làm việc tốt. Hãy bám chặt lấy nguyên lý này với sự quyết tâm, can đảm và niềm tin bất biến. Nhớ rằng bạn có thể điều khiển tất cả mọi thứ trong vũ trụ này để nhận ra và thỏa mãn đam mê của bạn. Hãy tận dụng sức','2024-04-11',30,NULL,'2024-04-07 06:17:07');
/*!40000 ALTER TABLE `sach_noi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach_soi`
--

DROP TABLE IF EXISTS `sach_soi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach_soi` (
  `MaSach` int NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `HinhAnhBia` varchar(255) DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  `Gia` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MaSach`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `sach_soi_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc_sachsoi` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `sach_soi_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach_soi`
--

LOCK TABLES `sach_soi` WRITE;
/*!40000 ALTER TABLE `sach_soi` DISABLE KEYS */;
INSERT INTO `sach_soi` VALUES (1014,'Lão tổ huyền môn bị ép trở thành thần','Y Nhân Vi Hoa','Từ bé, Tiểu Kiều đã lăn lộn dưới đáy xã hội, cô không phân biệt được thiện và ác, ngay và gian. Năm xưa, cô từng đánh nhau với người ta đến nỗi thương tích đầy mình vì miếng cơm manh áo. Khi ấy, một người đàn ông mặc Âu phục, dáng vẻ hào hoa phong nhã đã xuất hiện trước mặt cô.\r\nNgười ấy chìa tay ra với cô và hỏi: “Có muốn đi theo tôi không?”\r\nTiểu Kiều nghiêng đầu hỏi: “Có được ăn no không?”\r\nBùi Cửu gia cười khẽ, nghiêm nghị trả lời với gương mặt hiền hòa: “Không chỉ được ăn no mà tôi còn có thể giúp em trở thành một nữ hoàng, khiến người khác phải ngước nhìn.”\r\nKể từ đó, Tiểu Kiều có một cái tên mới, Kiều Lạc Yên.\r\n***\r\nBùi Cửu gia xuất thân từ danh môn vọng tộc, nhưng mãi đến lúc cận kề cái chết, anh mới b...','2024-04-22','sach_hieusoi/uploads/451.jpg','2024-04-07 06:04:28',6,NULL,2432);
/*!40000 ALTER TABLE `sach_soi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach_tomtat`
--

DROP TABLE IF EXISTS `sach_tomtat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach_tomtat` (
  `MaSach` int NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `MoTa` text,
  `NamXuatBan` varchar(225) DEFAULT NULL,
  `HinhAnhBia` varchar(255) DEFAULT NULL,
  `ThoiGianThem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LoaiSach` varchar(255) NOT NULL,
  `danhMucID` int DEFAULT NULL,
  `hoivienID` int DEFAULT NULL,
  PRIMARY KEY (`MaSach`),
  KEY `danhMucID` (`danhMucID`),
  KEY `hoivienID` (`hoivienID`),
  CONSTRAINT `sach_tomtat_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `danhmuc` (`MaDM`) ON DELETE SET NULL,
  CONSTRAINT `sach_tomtat_ibfk_2` FOREIGN KEY (`hoivienID`) REFERENCES `hoi_vien` (`MaHV`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach_tomtat`
--

LOCK TABLES `sach_tomtat` WRITE;
/*!40000 ALTER TABLE `sach_tomtat` DISABLE KEYS */;
/*!40000 ALTER TABLE `sach_tomtat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yeuthich`
--

DROP TABLE IF EXISTS `yeuthich`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yeuthich` (
  `MaYT` int NOT NULL AUTO_INCREMENT,
  `nguoi_dung_id` int DEFAULT NULL,
  `sach_id` int DEFAULT NULL,
  `audio_id` int DEFAULT NULL,
  `sach_soi_id` int DEFAULT NULL,
  `podcast_id` int DEFAULT NULL,
  `sach_noi_id` int DEFAULT NULL,
  PRIMARY KEY (`MaYT`),
  KEY `sach_noi_id` (`sach_noi_id`),
  KEY `podcast_id` (`podcast_id`),
  KEY `sach_soi_id` (`sach_soi_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `audio_id` (`audio_id`),
  KEY `sach_id` (`sach_id`),
  CONSTRAINT `yeuthich_ibfk_1` FOREIGN KEY (`sach_noi_id`) REFERENCES `sach_noi` (`MaSach`),
  CONSTRAINT `yeuthich_ibfk_2` FOREIGN KEY (`podcast_id`) REFERENCES `podcast` (`MaPodcast`),
  CONSTRAINT `yeuthich_ibfk_3` FOREIGN KEY (`sach_soi_id`) REFERENCES `sach_soi` (`MaSach`),
  CONSTRAINT `yeuthich_ibfk_4` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `khach_hang` (`MaKH`),
  CONSTRAINT `yeuthich_ibfk_5` FOREIGN KEY (`audio_id`) REFERENCES `audiofiles` (`MaAudio`),
  CONSTRAINT `yeuthich_ibfk_6` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yeuthich`
--

LOCK TABLES `yeuthich` WRITE;
/*!40000 ALTER TABLE `yeuthich` DISABLE KEYS */;
INSERT INTO `yeuthich` VALUES (74,1,NULL,NULL,1014,NULL,NULL),(75,1,NULL,NULL,NULL,NULL,574);
/*!40000 ALTER TABLE `yeuthich` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-09 18:59:40
